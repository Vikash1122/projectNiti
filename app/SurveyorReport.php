<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Jobs;

class SurveyorReport extends Model
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

    public static function viewJobReport($id){
       // prd($id);
        $myarray = Jobs::select('jobs.*','amcs.title','amcs.address','amcs.lat','amcs.lng','users.firstname','users.lastname','users.mobile','users.profile_pic','surveys.servey_date','surveys.survey_slot_id','slots.slot_timename','slots.slotstart_time','slots.slotend_time','surveys.surveyor_emp_id','employees.employee_name','employees.emp_profile','employees.emp_role','employees.emp_mobile')
                    ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
                    ->leftjoin('users','users.id','=','jobs.user_id')
                    ->leftjoin('surveys','surveys.job_id','=','jobs.id')
                    ->leftjoin('slots','slots.id','surveys.survey_slot_id')
                    ->leftjoin('employees','employees.id','=','surveys.surveyor_emp_id')
                    ->where('jobs.id','=',$id)
                    ->first();

        $reportservice = static::select('surveyor_reports.service_id','surveyor_reports.data','services.service_name')
            ->leftjoin('services','services.id','=','surveyor_reports.service_id')
            //->where('user_id','=',$input['user_id'])
            ->where('surveyor_reports.job_id','=',$id)
            ->groupBy('surveyor_reports.service_id')
            ->get();
           
        if(isset($reportservice) && !empty($reportservice)){
            $return_arr = array() ;
                foreach($reportservice as $t=>$data){
                    //service_id milega 
                    $return_arr[$t]['service_id'] = $data['service_id'];
                    $return_arr[$t]['service_name'] = $data['service_name'];
                    $return_arr[$t]['comments'] = json_decode($data['data']);

                    $return_arr[$t]['total_servicePrice'] = array_sum(array_column($return_arr[$t]['comments'],'estimate_price'));
                    $return_arr[$t]['total_estimateTime'] = array_sum(array_column($return_arr[$t]['comments'],'estimate_time'));
                }
                $myarray['reportservice'] = $return_arr;

                foreach($myarray['reportservice'] as $t=>$k){

                       $myarray['est_price'] += $k['total_servicePrice'];
                       $myarray['est_time'] += $k['total_estimateTime'];
                }  
                $myarray['services'] = implode(', ', array_column($myarray['reportservice'], 'service_name'));
            return $myarray;
        }else{
            return false;
        }

    }
}
