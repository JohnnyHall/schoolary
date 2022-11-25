<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\cronogramaStoreRequest;
use App\Models\cronograma;
use Illuminate\Http\Request;
use App\Traits\SchoolSession;
use App\Repositories\cronogramaRepository;
use App\Interfaces\SchoolClassInterface;
use App\Interfaces\SchoolSessionInterface;

class cronogramaController extends Controller
{
    use SchoolSession;
    protected $schoolSessionRepository;
    protected $schoolClassRepository;

    public function __construct(SchoolSessionInterface $schoolSessionRepository, SchoolClassInterface $schoolClassRepository)
    {
        $this->schoolSessionRepository = $schoolSessionRepository;
        $this->schoolClassRepository = $schoolClassRepository;
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
            'classes'                   => $school_classes,
        ];

        return view('cronogramas.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  cronogramaStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(cronogramaStoreRequest $request)
    {
        try {
            $cronogramaRepository = new cronogramaRepository();
            $cronogramaRepository->savecronograma($request->validated());

            return back()->with('status', 'cronograma save was successful!');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $cronograma
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $class_id = $request->query('class_id', 0);
        $section_id = $request->query('section_id', 0);
        $current_school_session_id = $this->getSchoolCurrentSession();
        $cronogramaRepository = new cronogramaRepository();
        $cronogramas = $cronogramaRepository->getAll($class_id, $section_id, $current_school_session_id);
        $cronogramas = $cronogramas->sortBy('weekday')->groupBy('weekday');

        $data = [
            'cronogramas' => $cronogramas
        ];

        return view('cronogramas.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cronograma  $cronograma
     * @return \Illuminate\Http\Response
     */
    public function edit(cronograma $cronograma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cronograma  $cronograma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cronograma $cronograma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cronograma  $cronograma
     * @return \Illuminate\Http\Response
     */
    public function destroy(cronograma $cronograma)
    {
        //
    }
}
