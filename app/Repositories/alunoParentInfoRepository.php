<?php

namespace App\Repositories;

use App\Models\alunoParentInfo;

class alunoParentInfoRepository {
    public function store($request, $aluno_id) {
        try {
            alunoParentInfo::create([
                'aluno_id'    => $aluno_id,
                'father_name'   => $request['father_name'],
                'father_phone'  => $request['father_phone'],
                'mother_name'   => $request['mother_name'],
                'mother_phone'  => $request['mother_phone'],
                'parent_address'=> $request['parent_address'],
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Failed to create aluno Parent information. '.$e->getMessage());
        }
    }

    public function getParentInfo($aluno_id) {
        return alunoParentInfo::where('aluno_id', $aluno_id)
                ->first();
    }

    public function update($request, $aluno_id) {
        try {
            alunoParentInfo::where('aluno_id', $aluno_id)->update([
                'father_name'   => $request['father_name'],
                'father_phone'  => $request['father_phone'],
                'mother_name'   => $request['mother_name'],
                'mother_phone'  => $request['mother_phone'],
                'parent_address'=> $request['parent_address'],
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Failed to update aluno Parent information. '.$e->getMessage());
        }
    }
}