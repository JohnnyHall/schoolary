<?php

namespace App\Interfaces;

interface AttendanceInterface {
    
    public function saveAttendance($request);

    public function getSectionAttendance($class_id, $section_id, $session_id);

    public function getCourseAttendance($class_id, $course_id, $session_id);

    public function getalunoAttendance($session_id, $aluno_id);
}