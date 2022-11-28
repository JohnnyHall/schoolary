<?php

namespace App\Repositories;

use App\Models\cronograma;
use App\Interfaces\cronogramaInterface;

class cronogramaRepository implements cronogramaInterface {
    public function savecronograma($request)
    {
        try{
            cronograma::create([
                'start'         => $request['start'],
                'end'           => $request['end'],
                'weekday'       => $request['weekday'],
                'session_id'    => $request['session_id'],
                'class_id'      => $request['class_id'],
                'section_id'    => $request['section_id'],
                'course_id'     => $request['course_id'],
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Failed to save cronograma. '.$e->getMessage());
        }
    }

    public function getAll($class_id, $section_id, $session_id) {
        return cronograma::with('course')
                ->where('session_id', $session_id)
                ->where('class_id', $class_id)
                ->where('section_id', $section_id)
                ->get();
    }
}