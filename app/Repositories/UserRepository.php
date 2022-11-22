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
use App\Repositories\alunoParentInfoRepository;
use App\Repositories\alunoAcademicoInfoRepository;

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
                    'address2'      => $request['address2'],
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
                    'view routines',
                    'view syllabi',
                    'view events',
                    'view notices',
                );
            });
        } catch (\Exception $e) {
            throw new \Exception('Failed to create Teacher. '.$e->getMessage());
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
                    'address2'      => $request['address2'],
                    'city'          => $request['city'],
                    'zip'           => $request['zip'],
                    'photo'         => (!empty($request['photo']))?$this->convert($request['photo']):null,
                    'birthday'      => $request['birthday'],
                    'religion'      => $request['religion'],
                    'blood_type'    => $request['blood_type'],
                    'role'          => 'aluno',
                    'password'      => Hash::make($request['password']),
                ]);

                // Store Parents' information
                $alunoParentInfoRepository = new alunoParentInfoRepository();
                $alunoParentInfoRepository->store($request, $aluno->id);

                // Store Academico information
                $alunoAcademicoInfoRepository = new alunoAcademicoInfoRepository();
                $alunoAcademicoInfoRepository->store($request, $aluno->id);

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
                    'view routines',
                    'view syllabi',
                    'view events',
                    'view notices',
                );
            });
        } catch (\Exception $e) {
            throw new \Exception('Failed to create aluno. '.$e->getMessage());
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
                    'address2'      => $request['address2'],
                    'city'          => $request['city'],
                    'zip'           => $request['zip'],
                    'birthday'      => $request['birthday'],
                    'religion'      => $request['religion'],
                    'blood_type'    => $request['blood_type'],
                ]);

                // Update Parents' information
                $alunoParentInfoRepository = new alunoParentInfoRepository();
                $alunoParentInfoRepository->update($request, $request['aluno_id']);

                // Update aluno's ID card number
                $promotionRepository = new PromotionRepository();
                $promotionRepository->update($request, $request['aluno_id']);
            });
        } catch (\Exception $e) {
            throw new \Exception('Failed to update aluno. '.$e->getMessage());
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
                    'address2'      => $request['address2'],
                    'city'          => $request['city'],
                    'zip'           => $request['zip'],
                ]);
            });
        } catch (\Exception $e) {
            throw new \Exception('Failed to update Teacher. '.$e->getMessage());
        }
    }

    public function getAllalunos($session_id, $class_id, $section_id) {
        if($class_id == 0 || $section_id == 0) {
            $schoolClass = SchoolClass::where('session_id', $session_id)
                                    ->first();
            $section = Section::where('session_id', $session_id)
                                    ->first();
            if($schoolClass == null || $section == null){
                throw new \Exception('There is no class and section');
            } else {
                $class_id = $schoolClass->id;
                $section_id = $section->id;
            }
            
        }
        try {
            $promotionRepository = new PromotionRepository();
            return $promotionRepository->getAll($session_id, $class_id, $section_id);
        } catch (\Exception $e) {
            throw new \Exception('Failed to get all alunos. '.$e->getMessage());
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
            return User::with('parent_info', 'academico_info')->where('id', $id)->first();
        } catch (\Exception $e) {
            throw new \Exception('Failed to get aluno. '.$e->getMessage());
        }
    }

    public function findTeacher($id) {
        try {
            return User::where('id', $id)->where('role', 'teacher')->first();
        } catch (\Exception $e) {
            throw new \Exception('Failed to get Teacher. '.$e->getMessage());
        }
    }

    public function getAllTeachers() {
        try {
            return User::where('role', 'teacher')->get();
        } catch (\Exception $e) {
            throw new \Exception('Failed to get all Teachers. '.$e->getMessage());
        }
    }

    public function changePassword($new_password) {
        try {
            return User::where('id', auth()->user()->id)->update([
                'password'  => Hash::make($new_password)
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Failed to change password. '.$e->getMessage());
        }
    }
}