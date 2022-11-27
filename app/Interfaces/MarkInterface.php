<?php

namespace App\Interfaces;

interface MarkInterface {
    public function create($rows);

    public function getAll($session_id, $semester_id, $class_id, $section_id, $course_id);

    public function getAllByalunoId($session_id, $semester_id, $class_id, $section_id, $course_id, $aluno_id);

    public function getAllFinalMarksByalunoId($session_id, $aluno_id, $semester_id, $class_id, $section_id, $course_id);

    public function storeFinalMarks($rows);
}