<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\SchoolSession;
use App\Interfaces\UserInterface;
use App\Interfaces\CourseInterface;
use App\Interfaces\SectionInterface;
use App\Interfaces\SemesterInterface;
use App\Interfaces\SchoolClassInterface;
use App\Interfaces\SchoolSessionInterface;
use App\Interfaces\AcademicoSettingInterface;
use App\Http\Requests\AttendanceTypeUpdateRequest;

class AcademicoSettingController extends Controller
{
    use SchoolSession;
    protected $academicoSettingRepository;
    protected $schoolSessionRepository;
    protected $schoolClassRepository;
    protected $schoolSectionRepository;
    protected $userRepository;
    protected $courseRepository;
    protected $semesterRepository;

    public function __construct(
        AcademicoSettingInterface $academicoSettingRepository,
        SchoolSessionInterface $schoolSessionRepository,
        SchoolClassInterface $schoolClassRepository,
        SectionInterface $schoolSectionRepository,
        UserInterface $userRepository,
        CourseInterface $courseRepository,
        SemesterInterface $semesterRepository
    ) {
        $this->middleware(['can:view academico settings']);

        $this->academicoSettingRepository = $academicoSettingRepository;
        $this->schoolSessionRepository = $schoolSessionRepository;
        $this->schoolClassRepository = $schoolClassRepository;
        $this->schoolSectionRepository = $schoolSectionRepository;
        $this->userRepository = $userRepository;
        $this->courseRepository = $courseRepository;
        $this->semesterRepository = $semesterRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_school_session_id = $this->getSchoolCurrentSession();

        $latest_school_session = $this->schoolSessionRepository->getLatestSession();

        $academico_setting = $this->academicoSettingRepository->getAcademicoSetting();

        $school_sessions = $this->schoolSessionRepository->getAll();

        $school_classes = $this->schoolClassRepository->getAllBySession($current_school_session_id);

        $school_sections = $this->schoolSectionRepository->getAllBySession($current_school_session_id);

        $teachers = $this->userRepository->getAllTeachers();

        $courses = $this->courseRepository->getAll($current_school_session_id);

        $semesters = $this->semesterRepository->getAll($current_school_session_id);

        $data = [
            'current_school_session_id' => $current_school_session_id,
            'latest_school_session_id'  => $latest_school_session->id,
            'academico_setting'          => $academico_setting,
            'school_sessions'           => $school_sessions,
            'school_classes'            => $school_classes,
            'school_sections'           => $school_sections,
            'teachers'                  => $teachers,
            'courses'                   => $courses,
            'semesters'                 => $semesters,
        ];

        return view('academicos.settings', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AttendanceTypeUpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function updateAttendanceType(AttendanceTypeUpdateRequest $request)
    {
        try {
            $this->academicoSettingRepository->updateAttendanceType($request->validated());

            return back()->with('status', 'Attendance type update was successful!');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function updateFinalMarksSubmissionStatus(Request $request) {
        try {
            $this->academicoSettingRepository->updateFinalMarksSubmissionStatus($request);

            return back()->with('status', 'Final marks submission status update was successful!');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }
}
