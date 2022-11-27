<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\SchoolSession;
use App\Interfaces\SemesterInterface;
use App\Interfaces\SchoolSessionInterface;
use App\Http\Requests\professorAssignRequest;
use App\Repositories\AssignedprofessorRepository;

class AssignedprofessorController extends Controller
{
    use SchoolSession;
    protected $schoolSessionRepository;
    protected $semesterRepository;

    /**
    * Create a new Controller instance
    * 
    * @param SchoolSessionInterface $schoolSessionRepository
    * @return void
    */
    public function __construct(SchoolSessionInterface $schoolSessionRepository,
    SemesterInterface $semesterRepository) {
        $this->schoolSessionRepository = $schoolSessionRepository;
        $this->semesterRepository = $semesterRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @param  CourseStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function getprofessorCourses(Request $request)
    {
        $professor_id = $request->query('professor_id');
        $semester_id = $request->query('semester_id');

        if($professor_id == null) {
            abort(404);
        }
        
        $current_school_session_id = $this->getSchoolCurrentSession();

        $semesters = $this->semesterRepository->getAll($current_school_session_id);

        $assignedprofessorRepository = new AssignedprofessorRepository();

        if($semester_id == null) {
            $courses = [];
        } else {
            $courses = $assignedprofessorRepository->getprofessorCourses($current_school_session_id, $professor_id, $semester_id);
        }
        
        $data = [
            'courses'               => $courses,
            'semesters'             => $semesters,
            'selected_semester_id'  => $semester_id,
        ];

        return view('courses.professor', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  professorAssignRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(professorAssignRequest $request)
    {
        try {
            $assignedprofessorRepository = new AssignedprofessorRepository();
            $assignedprofessorRepository->assign($request->validated());

            return back()->with('status', 'Assigning professor was successful!');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }
}
