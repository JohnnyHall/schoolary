<?php

namespace App\Interfaces;

interface AssignedprofessorInterface {
    public function assign($request);

    public function getprofessorCourses($session_id, $professor_id, $semester_id);

    public function getAssignedprofessor($session_id, $semester_id, $class_id, $section_id, $course_id);
}