<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\SchoolSession;
use App\Interfaces\UserInterface;
use App\Repositories\NoticeRepository;
use App\Interfaces\SchoolClassInterface;
use App\Interfaces\SchoolSessionInterface;
use App\Repositories\PromotionRepository;

class HomeController extends Controller
{
    use SchoolSession;
    protected $schoolSessionRepository;
    protected $schoolClassRepository;
    protected $userRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        UserInterface $userRepository, SchoolSessionInterface $schoolSessionRepository, SchoolClassInterface $schoolClassRepository)
    {
        // $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->schoolSessionRepository = $schoolSessionRepository;
        $this->schoolClassRepository = $schoolClassRepository;
    }

    /**
     * Show the application Central.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $current_school_session_id = $this->getSchoolCurrentSession();

        $classCount = $this->schoolClassRepository->getAllBySession($current_school_session_id)->count();

        $alunoCount = $this->userRepository->getAllalunosBySessionCount($current_school_session_id);

        $promotionRepository = new PromotionRepository();

        $MasculinoalunosBySession = $promotionRepository->getMasculinoalunosBySessionCount($current_school_session_id);

        $teacherCount = $this->userRepository->getAllTeachers()->count();

        $noticeRepository = new NoticeRepository();
        $notices = $noticeRepository->getAll($current_school_session_id);

        $data = [
            'classCount'    => $classCount,
            'alunoCount'  => $alunoCount,
            'teacherCount'  => $teacherCount,
            'notices'       => $notices,
            'MasculinoalunosBySession' => $MasculinoalunosBySession,
        ];

        return view('home', $data);
    }
}
