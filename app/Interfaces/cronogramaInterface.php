<?php

namespace App\Interfaces;

interface cronogramaInterface {
    public function savecronograma($request);

    public function getAll($class_id, $section_id, $session_id);
}