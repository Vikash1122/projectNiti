<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Group;

class Vehicle extends Model
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

    public function drivers()
    {
       return $this->hasMany(Group::class,'group_vehicle');
    }

    public static function InsertVehicle($data, $picture,$picture1) {
        $date = date('Y-m-d', strtotime($data['manufacturing_year']));
        $datae1 = date('Y-m-d', strtotime($data['registration_expiration']));
       
        $insert = new Vehicle();
        $insert->manufacturer = (isset($data['manufacturer'])) ? $data['manufacturer'] : '';
        $insert->vehicle_type = (isset($data['vehicle_type'])) ? $data['vehicle_type'] : NULL;
        $insert->registration_card = (isset($data['registration_card'])) ? $data['registration_card'] : NULL;
        $insert->vehicle_no = (isset($data['vehicle_no'])) ? $data['vehicle_no'] : NULL;
        $insert->modal_no = (isset($data['modal_no'])) ? $data['modal_no'] : null;
        $insert->manufacturing_year = (isset($date)) ? $date : NULL;
        $insert->vehicle_partner = (isset($data['vehicle_partner'])) ? $data['vehicle_partner'] : NULL;
        $insert->owner_name = (isset($data['owner_name'])) ? $data['owner_name'] : NULL;
        $insert->vehilce_color = (isset($data['vehilce_color'])) ? $data['vehilce_color'] : NULL;
        $insert->registration_number = (isset($data['registration_number'])) ? $data['registration_number'] : NULL;
        $insert->registration_expiration = (isset($datae1)) ? $datae1 : NULL;
        $insert->registration_card = (isset($picture)) ? $picture: NULL;
        $insert->vehicle_pic = (isset($picture1)) ? $picture1: NULL;
        $insert->status = 1;
        $save = $insert->save();
        if ($save) {
            $insert_id = $insert->id;
            return $insert_id;
        }else{
            return false;
        }
    }


    public static function updateVehicle($data, $id, $picture,$picture1) {
        
        $date = date('Y-m-d', strtotime($data['manufacturing_year']));
        $datae1 = date('Y-m-d', strtotime($data['registration_expiration']));
        //prd($data);
        $update = static::where('id', $id)->first();
        $update->manufacturer = (isset($data['manufacturer'])) ? $data['manufacturer'] : NULL;
        $update->vehicle_type = (isset($data['vehicle_type'])) ? $data['vehicle_type'] : NULL;
        $update->registration_card = (isset($data['registration_card'])) ? $data['registration_card'] : NULL;
        $update->vehicle_no = (isset($data['vehicle_no'])) ? $data['vehicle_no'] : NULL;
        $update->modal_no = (isset($data['modal_no'])) ? $data['modal_no'] : NULL;
        $update->manufacturing_year = (isset($date)) ? $date : NULL;
        $update->vehicle_partner = (isset($data['vehicle_partner'])) ? $data['vehicle_partner'] : NULL;
        $update->owner_name = (isset($data['owner_name'])) ? $data['owner_name'] : NULL;
        $update->vehilce_color = (isset($data['vehilce_color'])) ? $data['vehilce_color'] : 'OFF';
        $update->registration_number = (isset($data['registration_number'])) ? $data['registration_number'] : NULL;
        //$update->registration_expiration = (isset($data['registration_expiration'])) ? $data['registration_expiration'] : NULL;
        $update->registration_expiration = (isset($datae1)) ? $datae1 : NULL;
        $update->registration_card = (isset($picture)) ? $picture: NULL;
        $update->vehicle_pic = (isset($picture1)) ? $picture1: NULL;
        $save = $update->save();
        if ($save) {
            return $update;
        }else{
            return false;
        }
    }

    public static function getall(){
        $data = static::get();

        foreach($data as $d){
            $d['total_jobs'] = Group::Select(\DB::raw('COUNT(id) as total_jobs'))->where('group_vehicle',$d->id)->first();
            $month = date('m');
            $year = date('Y');
            $day = date('d');
            $d['currentmonth_jobs'] = Group::Select(\DB::raw('COUNT(id) as currentmonth_jobs'))->whereRaw('MONTH(group_date) = ?',[$month])->where('group_vehicle',$d->id)->first();
            $current_status = Group::whereRaw('YEAR(group_date) > ?',[$year])
                                    ->whereRaw('MONTH(group_date) > ?',[$month])
                                    ->whereRaw('DAY(group_date) > ?',[$day])
                                    ->where('group_vehicle',$d->id)->first();

            $jobId = JobGroup::select('job_groups.job_id','jobs.job_date')
                    ->leftjoin('jobs','jobs.id','=','job_groups.job_id')
                    ->whereRaw('YEAR(jobs.job_date) > ?',[$year])
                    ->whereRaw('MONTH(jobs.job_date) > ?',[$month])
                    ->whereRaw('DAY(jobs.job_date) > ?',[$day])
                    ->where('vehicle_id',$d->id)
                    ->first();
            $current_job = Jobs::select('jobs.id','amcs.address','surveys.surveyor_emp_id','job_groups.vehicle_id')
                    ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
                    ->leftjoin('surveys','surveys.job_id','=','jobs.id')
                    ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
                    ->where('job_groups.vehicle_id',$d->id)
                    ->orderBy('jobs.id','desc')->first();
            //print_r($current_job);
            // $current_job1 = Jobs::select('jobs.id','amcs.address','surveys.surveyor_emp_id','groups.group_vehicle')
            //         ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
            //         ->leftjoin('surveys','surveys.job_id','=','jobs.id')
            //         ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
            //         ->where('job_groups.vehicle_id',$d->id)
            //         ->orderBy('jobs.id','desc')->first();
            if(isset($current_job) && !empty($current_job)){
                $d['current_job'] = $current_job;
            }
            // else{
            //     $d['current_job'] = $current_job1;
            // }
            if($current_status == '' || $jobId == ''){ 
                $d['currentStatus'] = 'Available';
            }else{
                $d['currentStatus'] = 'Unavailable';
            }
        }
        if($data){
            return $data;
        }else{
            return false;
        }
    }
}
