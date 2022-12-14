<?php

namespace App\Interfaces;

interface UserInterface {
    public function createTeacher($request);

    public function updateTeacher($request);

    public function createaluno($request);

    public function updatealuno($request);

    public function getAllalunos($current_session, $class_id, $section_id);

    public function getAllalunosBySession($session_id);

    public function getAllalunosBySessionCount($session_id);

    public function findaluno($id);

    public function findTeacher($id);

    public function getAllTeachers();

    public function changePassword($new_password);
}