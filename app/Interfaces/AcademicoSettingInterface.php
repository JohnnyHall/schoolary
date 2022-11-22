<?php

namespace App\Interfaces;

interface AcademicoSettingInterface {
    public function getAcademicoSetting();
    
    public function updateAttendanceType($request);

    public function updateFinalMarksSubmissionStatus($request);
}