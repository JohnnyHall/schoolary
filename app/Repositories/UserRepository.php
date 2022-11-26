<?php

namespace App\Repositories;

use App\Models\User;
use App\Traits\Base64ToFile;
use App\Interfaces\UserInterface;
use App\Models\SchoolClass;
use App\Models\Section;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Repositories\PromotionRepository;
use App\Repositories\alunoAcademicInfoRepository;

class UserRepository implements UserInterface {
    use Base64ToFile;

    /**
     * @param mixed $request
     * @return string
    */
    public function createTeacher($request) {
        try {
            DB::transaction(function () use ($request) {
                $user = User::create([
                    'first_name'    => $request['first_name'],
                    'last_name'     => $request['last_name'],
                    'email'         => $request['email'],
                    'gender'        => $request['gender'],
                    'nationality'   => $request['nationality'],
                    'phone'         => $request['phone'],
                    'address'       => $request['address'],
                    'city'          => $request['city'],
                    'zip'           => $request['zip'],
                    'photo'         => (!empty($request['photo']))?$this->convert($request['photo']):null,
                    'role'          => 'teacher',
                    'password'      => Hash::make($request['password']),
                ]);
                $user->givePermissionTo(
                    'create exams',
                    'view exams',
                    'create exams rule',
                    'view exams rule',
                    'edit exams rule',
                    'delete exams rule',
                    'take attendances',
                    'view attendances',
                    'create assignments',
                    'view assignments',
                    'save marks',
                    'view users',
                    'Ver Cronogramas',
                    'view monitor',
                    'view events',
                    'view notices',
                );
            });
        } catch (\Exception $e) {
            throw new \Exception('Falha na criação do professor. '.$e->getMessage());
        }
    }

    /**
     * @param mixed $request
     * @return string
    */
    public function createaluno($request) {
        try {
            DB::transaction(function () use ($request) {
                $aluno = User::create([
                    'first_name'    => $request['first_name'],
                    'last_name'     => $request['last_name'],
                    'email'         => $request['email'],
                    'gender'        => $request['gender'],
                    'nationality'   => $request['nationality'],
                    'phone'         => $request['phone'],
                    'address'       => $request['address'],
                    'city'          => $request['city'],
                    'zip'           => $request['zip'],
                    'photo'         => (!empty($request['photo']))?$this->convert($request['photo']):null,
                    'Aniversario'      => $request['Aniversario'],
                    'lista_filmes'    => $request['lista_filmes'],
                    'role'          => 'aluno',
                    'password'      => Hash::make($request['password']),
                ]);

                // Store Academic information
                $alunoAcademicInfoRepository = new alunoAcademicInfoRepository();
                $alunoAcademicInfoRepository->store($request, $aluno->id);

                // Assign aluno to a Class and a Section
                $promotionRepository = new PromotionRepository();
                $promotionRepository->assignClassSection($request, $aluno->id);

                $aluno->givePermissionTo(
                    'view attendances',
                    'view assignments',
                    'submit assignments',
                    'view exams',
                    'view marks',
                    'view users',
                    'Ver Cronogramas',
                    'view monitor',
                    'view events',
                    'view notices',
                );
            });
        } catch (\Exception $e) {
            throw new \Exception('Falha na criação do aluno. '.$e->getMessage());
        }
    }

    public function updatealuno($request) {
        try {
            DB::transaction(function () use ($request) {
                User::where('id', $request['aluno_id'])->update([
                    'first_name'    => $request['first_name'],
                    'last_name'     => $request['last_name'],
                    'email'         => $request['email'],
                    'gender'        => $request['gender'],
                    'nationality'   => $request['nationality'],
                    'phone'         => $request['phone'],
                    'address'       => $request['address'],
                    'city'          => $request['city'],
                    'zip'           => $request['zip'],
                    'Aniversario'      => $request['Aniversario'],
                    'lista_filmes'    => $request['lista_filmes'],
                ]);


                // Update aluno's RA
                $promotionRepository = new PromotionRepository();
                $promotionRepository->update($request, $request['aluno_id']);
            });
        } catch (\Exception $e) {
            throw new \Exception('Falha ao atualizar o aluno. '.$e->getMessage());
        }
    }

    public function updateTeacher($request) {
        try {
            DB::transaction(function () use ($request) {
                User::where('id', $request['teacher_id'])->update([
                    'first_name'    => $request['first_name'],
                    'last_name'     => $request['last_name'],
                    'email'         => $request['email'],
                    'gender'        => $request['gender'],
                    'nationality'   => $request['nationality'],
                    'phone'         => $request['phone'],
                    'address'       => $request['address'],
                    'city'          => $request['city'],
                    'zip'           => $request['zip'],
                ]);
            });
        } catch (\Exception $e) {
            throw new \Exception('Falha ao autilizar o professor. '.$e->getMessage());
        }
    }

    public function getAllalunos($session_id, $class_id, $section_id) {
        if($class_id == 0 || $section_id == 0) {
            $schoolClass = SchoolClass::where('session_id', $session_id)
                                    ->first();
            $section = Section::where('session_id', $session_id)
                                    ->first();
            if($schoolClass == null || $section == null){
                throw new \Exception('Não há nenhuma turma ou materia.');
            } else {
                $class_id = $schoolClass->id;
                $section_id = $section->id;
            }
            
        }
        try {
            $promotionRepository = new PromotionRepository();
            return $promotionRepository->getAll($session_id, $class_id, $section_id);
        } catch (\Exception $e) {
            throw new \Exception('Falha ao pegar todos os alunos. '.$e->getMessage());
        }
    }

    public function getAllalunosBySession($session_id) {
        $promotionRepository = new PromotionRepository();
        return $promotionRepository->getAllalunosBySession($session_id);
    }

    public function getAllalunosBySessionCount($session_id) {
        $promotionRepository = new PromotionRepository();
        return $promotionRepository->getAllalunosBySessionCount($session_id);
    }

    public function findaluno($id) {
        try {
            return User::with('academic_info')->where('id', $id)->first();
        } catch (\Exception $e) {
            throw new \Exception('Falha ao tentar pegar o aluno. '.$e->getMessage());
        }
    }

    public function findTeacher($id) {
        try {
            return User::where('id', $id)->where('role', 'teacher')->first();
        } catch (\Exception $e) {
            throw new \Exception('Falha ao tentar pegar o professor. '.$e->getMessage());
        }
    }

    public function getAllTeachers() {
        try {
            return User::where('role', 'teacher')->get();
        } catch (\Exception $e) {
            throw new \Exception('Falha ao tentar pegar todos os professores. '.$e->getMessage());
        }
    }

    public function changePassword($new_password) {
        try {
            return User::where('id', auth()->user()->id)->update([
                'password'  => Hash::make($new_password)
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Falha ao trocar de senha. '.$e->getMessage());
        }
    }
}