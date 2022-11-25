<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\monitoria;
use Illuminate\Http\Request;
use App\Traits\SchoolSession;
use App\Http\Requests\StoreFileRequest;
use App\Interfaces\SchoolClassInterface;
use App\Repositories\monitoriaRepository;
use App\Interfaces\SchoolSessionInterface;

class monitoriaController extends Controller
{
    use SchoolSession;
    protected $schoolSessionRepository;
    protected $schoolClassRepository;

    public function __construct(
        SchoolSessionInterface $schoolSessionRepository,
        SchoolClassInterface $schoolClassRepository
    ) {
        $this->schoolSessionRepository = $schoolSessionRepository;
        $this->schoolClassRepository = $schoolClassRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $course_id = $request->query('course_id', 0);
        $monitoriaRepository = new monitoriaRepository();
        $monitor = $monitoriaRepository->getByCourse($course_id);

        $data = [
            'monitor'   => $monitor
        ];

        return view('monitor.show', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current_school_session_id = $this->getSchoolCurrentSession();

        $school_classes = $this->schoolClassRepository->getAllBySession($current_school_session_id);

        $data = [
            'current_school_session_id' => $current_school_session_id,
            'school_classes'    => $school_classes,
        ];
        return view('monitor.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreFileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFileRequest $request)
    {
        $validatedRequest = $request->validated();
        $validatedRequest['class_id'] = $request->class_id;
        $validatedRequest['course_id'] = $request->course_id;
        $validatedRequest['monitoria_name'] = $request->monitoria_name;
        $validatedRequest['session_id'] = $this->getSchoolCurrentSession();

        try {
            $monitoriaRepository = new monitoriaRepository();
            $monitoriaRepository->store($validatedRequest);

            return back()->with('status', 'Creating monitoria was successful!');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\monitoria  $monitoria
     * @return \Illuminate\Http\Response
     */
    public function show(monitoria $monitoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\monitoria  $monitoria
     * @return \Illuminate\Http\Response
     */
    public function edit(monitoria $monitoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\monitoria  $monitoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, monitoria $monitoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\monitoria  $monitoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(monitoria $monitoria)
    {
        //
    }
}
