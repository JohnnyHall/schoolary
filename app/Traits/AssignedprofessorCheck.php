<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AssignedprofessorRepository;

trait AssignedprofessorCheck {
    /**
     * @param  \Illuminate\Http\Request $request
     * @param int $current_school_session_id
     * @return string
    */
    public function checkIfLoggedInUserIsAssignedprofessor(Request $request, $current_school_session_id) {
        $assignedprofessorRepository = new AssignedprofessorRepository();

        $assignedprofessor = $assignedprofessorRepository->getAssignedprofessor($current_school_session_id, $request->semester_id, $request->class_id, $request->section_id, $request->course_id);
        
        if($assignedprofessor === null || $assignedprofessor->professor_id !== Auth::user()->id) {
            abort(404);
        }
    }
}