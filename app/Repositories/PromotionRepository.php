<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Promotion;

class PromotionRepository {
    public function assignClassSection($request, $aluno_id) {
        try{
            Promotion::create([
                'aluno_id'    => $aluno_id,
                'session_id'    => $request['session_id'],
                'class_id'      => $request['class_id'],
                'section_id'    => $request['section_id'],
                'RA'=> $request['RA'],
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Failed to add aluno. '.$e->getMessage());
        }
    }

    public function update($request, $aluno_id) {
        try{
            Promotion::where('aluno_id', $aluno_id)->update([
                'RA'=> $request['RA'],
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Failed to update aluno. '.$e->getMessage());
        }
    }

    public function massPromotion($rows) {
        try {
                foreach($rows as $row){
                    Promotion::updateOrCreate([
                        'aluno_id' => $row['aluno_id'],
                        'session_id' => $row['session_id'],
                        'class_id' => $row['class_id'],
                        'section_id' => $row['section_id'],
                    ],[
                        'RA' => $row['RA'],
                    ]);
                }
        } catch (\Exception $e) {
            throw new \Exception('Failed to promote alunos. '.$e->getMessage());
        }
    }

    public function getAll($session_id, $class_id, $section_id) {
        return Promotion::with(['aluno', 'section'])
                ->where('session_id', $session_id)
                ->where('class_id', $class_id)
                ->where('section_id', $section_id)
                ->get();
    }

    public function getAllalunosBySessionCount($session_id) {
        return Promotion::where('session_id', $session_id)
                ->count();
    }

    public function getMasculinoalunosBySessionCount($session_id) {
        $allalunos = Promotion::where('session_id', $session_id)->pluck('aluno_id')->toArray();

        return User::where('gender', 'Masculino')
                ->where('role', 'aluno')
                ->whereIn('id', $allalunos)
                ->count();
    }

    public function getAllalunosBySession($session_id) {
        return Promotion::with(['aluno', 'section'])
                ->where('session_id', $session_id)
                ->get();
    }

    public function getPromotionInfoById($session_id, $aluno_id) {
        return Promotion::with(['aluno', 'section'])
                ->where('session_id', $session_id)
                ->where('aluno_id', $aluno_id)
                ->first();
    }


    public function getClasses($session_id) {
        return Promotion::with('schoolClass')->select('class_id')
                    ->where('session_id', $session_id)
                    ->distinct('class_id')
                    ->get();
    }

    public function getSections($session_id, $class_id) {
        return Promotion::with('section')->select('section_id')
                    ->where('session_id', $session_id)
                    ->where('class_id', $class_id)
                    ->distinct('section_id')
                    ->get();
    }

    public function getSectionsBySession($session_id) {
        return Promotion::with('section')->select('section_id')
                    ->where('session_id', $session_id)
                    ->distinct('section_id')
                    ->get();
    }
}