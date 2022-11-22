<?php

namespace App\Repositories;

use App\Models\alunoAcademicoInfo;

class alunoAcademicoInfoRepository {
    public function store($request, $aluno_id) {
        try {
            alunoAcademicoInfo::create([
                'aluno_id'        => $aluno_id,
                'board_reg_no'      => $request['board_reg_no'],
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Failed to create aluno academico information. '.$e->getMessage());
        }
    }
}