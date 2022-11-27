<?php

namespace App\Repositories;

use App\Models\Semester;
use App\Models\Assignedprofessor;
use App\Interfaces\AssignedprofessorInterface;

class AssignedprofessorRepository implements AssignedprofessorInterface {

    public function assign($request) {
        try {
            Assignedprofessor::create($request);
        } catch (\Exception $e) {
            throw new \Exception('Failed to assign professor. '.$e->getMessage());
        }
    }

    public function getprofessorCourses($session_id, $professor_id, $semester_id) {
        if($semester_id == 0) {
            $semester_id = Semester::where('session_id', $session_id)
            ->first()->id;
        }
        return Assignedprofessor::with(['course', 'schoolClass', 'section'])->where('session_id', $session_id)
                        ->where('professor_id', $professor_id)
                        ->where('semester_id', $semester_id)
                        ->get(); 
    }

    public function getAssignedprofessor($session_id, $semester_id, $class_id, $section_id, $course_id) {
        if($semester_id == 0) {
            $semester_id = Semester::where('session_id', $session_id)
            ->first()->id;
        }
        return Assignedprofessor::where('session_id', $session_id)
                        ->where('semester_id', $semester_id)
                        ->where('class_id', $class_id)
                        ->where('section_id', $section_id)
                        ->where('course_id', $course_id)
                        ->first(); 
    }
}