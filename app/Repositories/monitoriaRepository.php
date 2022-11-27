<?php

namespace App\Repositories;

use App\Models\monitoria;
use Illuminate\Support\Facades\Storage;

class monitoriaRepository {
    public function store($request) {
        // Automatically generate a unique ID for filename...
        $path = Storage::disk('public')->put('monitor', $request['file']);
        try {
            monitoria::create([
                'monitoria_name'           => $request['monitoria_name'],
                'monitoria_file_path'      => $path,
                'class_id'                => $request['class_id'],
                'course_id'               => $request['course_id'],
                'session_id'              => $request['session_id']
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Failed to create monitoria. '.$e->getMessage());
        }
    }

    public function getByClass($class_id) {
        return monitoria::where('class_id', $class_id)->get();
    }

    public function getByCourse($course_id) {
        return monitoria::where('course_id', $course_id)->get();
    }
}