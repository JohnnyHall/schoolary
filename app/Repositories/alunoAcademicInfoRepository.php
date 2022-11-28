<?php

namespace App\Repositories;

use App\Models\alunoAcademicInfo;

class alunoAcademicInfoRepository {
    public function store($request, $aluno_id) {
        try {
            alunoAcademicInfo::create([
                'aluno_id'        => $aluno_id,
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Falha na criação das informações academicas. '.$e->getMessage());
        }
    }
}