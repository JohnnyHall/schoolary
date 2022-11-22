<?php

namespace App\Repositories;

use App\Models\StudentAcademicoInfo;

class StudentAcademicoInfoRepository {
    public function store($request, $student_id) {
        try {
            StudentAcademicoInfo::create([
                'student_id'        => $student_id,
                'board_reg_no'      => $request['board_reg_no'],
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Failed to create Student academico information. '.$e->getMessage());
        }
    }
}