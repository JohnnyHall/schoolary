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
use App\Http\Requests\professorestoreRequest;
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
     * @param  professorestoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function storeprofessor(professorestoreRequest $request)
    {
        try {
            $this->userRepository->createprofessor($request->validated());

            return back()->with('status', 'professor foi criado com sucesso!');
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

    public function showprofessorProfile($id) {
        $professor = $this->userRepository->findprofessor($id);
        $data = [
            'professor'   => $professor,
        ];
        return view('professores.profile', $data);
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

            return back()->with('status', 'Aluno foi criado com sucesso!');
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

            return back()->with('status', 'Aluno atualizado com sucesso!');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function editprofessor($professor_id) {
        $professor = $this->userRepository->findprofessor($professor_id);

        $data = [
            'professor'   => $professor,
        ];

        return view('professores.edit', $data);
    }
    public function updateprofessor(Request $request) {
        try {
            $this->userRepository->updateprofessor($request->toArray());

            return back()->with('status', 'professor atualizado com sucesso!');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function getprofessorList(){
        $professores = $this->userRepository->getAllprofessores();

        $data = [
            'professores' => $professores,
        ];

        return view('professores.list', $data);
    }
}
