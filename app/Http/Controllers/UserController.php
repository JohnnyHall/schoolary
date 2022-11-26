<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\SchoolSession;
use App\Interfaces\UserInterface;
use App\Interfaces\SectionInterface;
use App\Interfaces\SchoolClassInterface;
use App\Repositories\PromotionRepository;
use App\Http\Requests\alunoStoreRequest;
use App\Http\Requests\TeacherStoreRequest;
use App\Interfaces\SchoolSessionInterface;

class UserController extends Controller
{
    use SchoolSession;
    protected $userRepository;
    protected $schoolSessionRepository;
    protected $schoolClassRepository;
    protected $schoolSectionRepository;

    public function __construct(UserInterface $userRepository, SchoolSessionInterface $schoolSessionRepository,
    SchoolClassInterface $schoolClassRepository,
    SectionInterface $schoolSectionRepository)
    {
        $this->middleware(['can:view users']);

        $this->userRepository = $userRepository;
        $this->schoolSessionRepository = $schoolSessionRepository;
        $this->schoolClassRepository = $schoolClassRepository;
        $this->schoolSectionRepository = $schoolSectionRepository;
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  TeacherStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function storeTeacher(TeacherStoreRequest $request)
    {
        try {
            $this->userRepository->createTeacher($request->validated());

            return back()->with('status', 'Teacher creation was successful!');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function getalunoList(Request $request) {
        $current_school_session_id = $this->getSchoolCurrentSession();

        $class_id = $request->query('class_id', 0);
        $section_id = $request->query('section_id', 0);

        try{

            $school_classes = $this->schoolClassRepository->getAllBySession($current_school_session_id);

            $alunoList = $this->userRepository->getAllalunos($current_school_session_id, $class_id, $section_id);

            $data = [
                'alunoList'       => $alunoList,
                'school_classes'    => $school_classes,
            ];

            return view('alunos.list', $data);
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }


    public function showalunoProfile($id) {
        $aluno = $this->userRepository->findaluno($id);

        $current_school_session_id = $this->getSchoolCurrentSession();
        $promotionRepository = new PromotionRepository();
        $promotion_info = $promotionRepository->getPromotionInfoById($current_school_session_id, $id);

        $data = [
            'aluno'           => $aluno,
            'promotion_info'    => $promotion_info,
        ];

        return view('alunos.profile', $data);
    }

    public function showTeacherProfile($id) {
        $teacher = $this->userRepository->findTeacher($id);
        $data = [
            'teacher'   => $teacher,
        ];
        return view('teachers.profile', $data);
    }


    public function createaluno() {
        $current_school_session_id = $this->getSchoolCurrentSession();

        $school_classes = $this->schoolClassRepository->getAllBySession($current_school_session_id);

        $data = [
            'current_school_session_id' => $current_school_session_id,
            'school_classes'            => $school_classes,
        ];

        return view('alunos.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  alunoStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function storealuno(alunoStoreRequest $request)
    {
        try {
            $this->userRepository->createaluno($request->validated());

            return back()->with('status', 'aluno creation was successful!');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function editaluno($aluno_id) {
        $aluno = $this->userRepository->findaluno($aluno_id);
        $promotionRepository = new PromotionRepository();
        $current_school_session_id = $this->getSchoolCurrentSession();
        $promotion_info = $promotionRepository->getPromotionInfoById($current_school_session_id, $aluno_id);

        $data = [
            'aluno'       => $aluno,
            'promotion_info'=> $promotion_info,
        ];
        return view('alunos.edit', $data);
    }

    public function updatealuno(Request $request) {
        try {
            $this->userRepository->updatealuno($request->toArray());

            return back()->with('status', 'aluno update was successful!');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function editTeacher($teacher_id) {
        $teacher = $this->userRepository->findTeacher($teacher_id);

        $data = [
            'teacher'   => $teacher,
        ];

        return view('teachers.edit', $data);
    }
    public function updateTeacher(Request $request) {
        try {
            $this->userRepository->updateTeacher($request->toArray());

            return back()->with('status', 'Teacher update was successful!');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function getTeacherList(){
        $teachers = $this->userRepository->getAllTeachers();

        $data = [
            'teachers' => $teachers,
        ];

        return view('teachers.list', $data);
    }
}
