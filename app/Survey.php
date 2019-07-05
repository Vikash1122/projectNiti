<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Survey extends Model
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
    
    public static function InsertSurveyer($data){
        $date = date("Y-m-d", strtotime($data['servey_date']));
        $insert = new Survey();
        $insert->job_id = (isset($data['job_id'])) ? $data['job_id'] : '';
        $insert->servey_date = (isset($date)) ? $date : NULL;
        $insert->survey_slot_id = (isset($data['survey_slot_id'])) ? $data['survey_slot_id']: NULL;
        $insert->surveyor_emp_id = (isset($data['surveyor_emp_id'])) ? $data['surveyor_emp_id']: NULL;
        //prd($data);
        $save = $insert->save();
        if ($save) {
            $insert_id = $insert->id;
            return $insert_id;
        }else{
            return false;
        }
    }


    public static function getSurveyorDataDate($date){
        $data = static::select('surveys.*','employees.emp_profile','employees.employee_name','employees.emp_mobile')
            ->leftjoin('employees','employees.id','=','surveys.surveyor_emp_id')
            ->where('surveys.servey_date','=',$date)
            ->orderBy('surveys.id','desc')
            ->groupBy('surveys.surveyor_emp_id')
            ->get();

        foreach($data as $dt){
            $dt['jobs'] = static::select('surveys.job_id','jobs.*','users.firstname','users.lastname','users.profile_pic','users.mobile','amcs.title','amcs.address','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time')
                        ->leftjoin('jobs','jobs.id','=','surveys.job_id')
                        ->leftjoin('users','users.id','=','jobs.user_id')
                        ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
                        ->leftjoin('slots','slots.id','=','jobs.job_slot')
                        ->where('jobs.status','=',1)
                        ->where('surveyor_emp_id','=',$dt->surveyor_emp_id)
                        ->get(); 
        }
//prd($data->toArray());
        if(isset($data) && !empty($data)){
            return $data;
        }else{
            return false;
        }
        
    }

    
}
