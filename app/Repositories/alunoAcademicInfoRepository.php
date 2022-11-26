<?php

namespace App\Repositories;

use App\Models\alunoAcademicInfo;

class alunoAcademicInfoRepository {
    public function store($request, $aluno_id) {
        try {
            alunoAcademicInfo::create([
                'aluno_id'        => $aluno_id,
                'board_reg_no'      => $request['board_reg_no'],
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Failed to create aluno academic information. '.$e->getMessage());
        }
    }
}