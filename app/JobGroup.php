<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class JobGroup extends Model
{
    use LogsActivity;

    /**
     * Change activity log event description
     *
     * @param string $eventName
     *
     * @return string
     */
    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }
    
    public static function InsertJobGroupAllot($data) {
       
        $insert = new JobGroup();
        $insert->job_id = (isset($data['job_id'])) ? $data['job_id'] : NULL;
        $insert->group_id = (isset($data['group_id'])) ? $data['group_id'] : NULL;
        $insert->type = 1;
        $save = $insert->save();
        if ($save) {
            $insert_id = $insert->id;
            return $insert_id;
        }else{
            return false;
        }
    }

    public static function InsertJobempAllot($data) {
       
        $insert = new JobGroup();
        $insert->job_id = (isset($data['job_id'])) ? $data['job_id'] : NULL;
        $insert->employee_id = (isset($data['employee_id'])) ? $data['employee_id'] : NULL;
        $insert->employee_role = (isset($data['employee_role'])) ? $data['employee_role'] : NULL;
        $insert->slot_id = (isset($data['slot_id'])) ? $data['slot_id'] : NULL;
        $insert->vehicle_id = (isset($data['vehicle_id'])) ? $data['vehicle_id'] : NULL;
        $insert->type = 0;
        $save = $insert->save();
        if ($save) {
            $insert_id = $insert->id;
            return $insert_id;
        }else{
            return false;
        }
    }
}
