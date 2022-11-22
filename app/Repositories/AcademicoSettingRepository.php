<?php

namespace App\Repositories;

use App\Models\AcademicoSetting;
use App\Interfaces\AcademicoSettingInterface;

class AcademicoSettingRepository implements AcademicoSettingInterface {
    public function getAcademicoSetting(){
        return AcademicoSetting::find(1);
    }

    public function updateAttendanceType($request) {
        try {
            AcademicoSetting::where('id', 1)->update($request);
        } catch (\Exception $e) {
            throw new \Exception('Failed to update attendance type. '.$e->getMessage());
        }
    }

    public function updateFinalMarksSubmissionStatus($request) {
        $status = "off";
        if(isset($request['marks_submission_status'])) {
            $status = "on";
        }
        try {
            AcademicoSetting::where('id', 1)->update(['marks_submission_status' => $status]);
        } catch (\Exception $e) {
            throw new \Exception('Failed to update final marks submission status. '.$e->getMessage());
        }
    }
}