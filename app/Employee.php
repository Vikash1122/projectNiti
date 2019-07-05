<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use App\SurveyorReport;

class Employee extends Model
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

    
    public function empSer()
    {
       return $this->hasMany(EmpService::class)->select('service_id','employee_id');
    }

    static function getallEmp(){
        $data = Employee::Select('employees.*','emp_services.service_id',\DB::raw('group_concat(services.service_name) as service_name'))
                ->leftJoin('emp_services','emp_services.employee_id','=','employees.id')
                ->leftJoin('services','services.id','=','emp_services.service_id')
                ->groupBY('employees.id')
                ->get();
             //  prd($data->toArray());
        foreach($data as $k=>$d){
           // prd($d->toArray());
            $d['total_jobs'] = Survey::Select(\DB::raw('COUNT(id) as total_jobs'))->where('surveyor_emp_id',$d->id)->first();
            $month = date('m');
            $year = date('Y');
            $day = date('d');
            $d['currentmonth_jobs'] = Survey::Select(\DB::raw('COUNT(id) as currentmonth_jobs'))->whereRaw('MONTH(servey_date) = ?',[$month])->where('surveyor_emp_id',$d->id)->first();
            $current_status = Survey::whereRaw('YEAR(servey_date) > ?',[$year])
                                    ->whereRaw('MONTH(servey_date) > ?',[$month])
                                    ->whereRaw('DAY(servey_date) > ?',[$day])
                                    ->where('surveyor_emp_id',$d->id)->first();
                                
            if($current_status == ''){ 
                $d['currentStatus'] = 'Available';
            }else{
                $d['currentStatus'] = 'Unavailable';
            }
            
            $group = Group::select('group_name')->where('team_leader',$d->id)->orWhere('driver',$d->id)->orWhere('group_emp',$d->id)->first();
            $d['group'] = $group['group_name'];
           // print_r($d->id);
        }
        
        if(!empty($data)){
            return $data;
        }else{
            return false;
        }
    }

    static function getallEmpFilter($keyword){
        $data = Employee::Select('employees.*','emp_services.service_id',\DB::raw('group_concat(services.service_name) as service_name'))
                ->leftJoin('emp_services','emp_services.employee_id','=','employees.id')
                ->leftJoin('services','services.id','=','emp_services.service_id')
                ->where('employees.employee_name', 'LIKE', "%$keyword%")
                ->groupBY('employees.id')
                ->get();
        foreach($data as $k=>$d){
            $d['total_jobs'] = Survey::Select(\DB::raw('COUNT(id) as total_jobs'))->where('surveyor_emp_id',$d->id)->first();
            $month = date('m');
            $year = date('Y');
            $day = date('d');
            $d['currentmonth_jobs'] = Survey::Select(\DB::raw('COUNT(id) as currentmonth_jobs'))->whereRaw('MONTH(servey_date) = ?',[$month])->where('surveyor_emp_id',$d->id)->first();
            $current_status = Survey::whereRaw('YEAR(servey_date) > ?',[$year])
                                    ->whereRaw('MONTH(servey_date) > ?',[$month])
                                    ->whereRaw('DAY(servey_date) > ?',[$day])
                                    ->where('surveyor_emp_id',$d->id)->first();
                                
            if($current_status == ''){ 
                $d['currentStatus'] = 'Available';
            }else{
                $d['currentStatus'] = 'Unavailable';
            }
            
            $group = Group::select('group_name')->where('team_leader',$d->id)->first();
            $d['group'] = $group['group_name'];
        }
        
        if(!empty($data)){
            return $data;
        }else{
            return false;
        }
    }

    static function getEmpDEtail($id){
        $data = Employee::Select('employees.*','emp_services.service_id',\DB::raw('group_concat(services.service_name) as service_name'))
                ->leftJoin('emp_services','emp_services.employee_id','=','employees.id')
                ->leftJoin('services','services.id','=','emp_services.service_id')
                ->where('employees.id','=',$id)
                ->first();
        $data['total_jobs'] = Survey::Select(\DB::raw('COUNT(id) as total_jobs'))->where('surveyor_emp_id',$id)->first();
        $month = date('m');
        $year = date('Y');
        $day = date('d');
        $data['currentmonth_jobs'] = Survey::Select(\DB::raw('COUNT(id) as currentmonth_jobs'))->whereRaw('MONTH(servey_date) = ?',[$month])->where('surveyor_emp_id',$id)->first();
        $current_status = Survey::whereRaw('YEAR(servey_date) > ?',[$year])
                                ->whereRaw('MONTH(servey_date) > ?',[$month])
                                ->whereRaw('DAY(servey_date) > ?',[$day])
                                ->where('surveyor_emp_id',$id)->first();
                              
        if($current_status == ''){ 
            $data['currentStatus'] = 'Available';
        }else{
            $data['currentStatus'] = 'Unavailable';
        }
        $group = Group::select('group_name')->where('team_leader',$data->id)->first();
        $data['group'] = $group['group_name'];
        //prd($data->toArray());
        if(!empty($data)){
            return $data;
        }else{
            return false;
        }
    }

    static function getEmpallOrderDEtail($id){
        $data = Employee::Select('employees.*','emp_services.service_id',\DB::raw('group_concat(services.service_name) as service_name'))
                ->leftJoin('emp_services','emp_services.employee_id','=','employees.id')
                ->leftJoin('services','services.id','=','emp_services.service_id')
                ->where('employees.id','=',$id)
                ->first();
        $data['total_jobs'] = Survey::Select(\DB::raw('COUNT(id) as total_jobs'))->where('surveyor_emp_id',$id)->first();
        $month = date('m');
        $year = date('Y');
        $day = date('d');
        $data['currentmonth_jobs'] = Survey::Select(\DB::raw('COUNT(id) as currentmonth_jobs'))->whereRaw('MONTH(servey_date) = ?',[$month])->where('surveyor_emp_id',$id)->first();
        $current_status = Survey::whereRaw('YEAR(servey_date) > ?',[$year])
                                ->whereRaw('MONTH(servey_date) > ?',[$month])
                                ->whereRaw('DAY(servey_date) > ?',[$day])
                                ->where('surveyor_emp_id',$id)->first();
                              
        if($current_status == ''){ 
            $data['currentStatus'] = 'Available';
        }else{
            $data['currentStatus'] = 'Unavailable';
        }
        $data['alljobs'] = Jobs::select('jobs.*','amcs.address','surveys.surveyor_emp_id','job_groups.group_id','job_groups.vehicle_id','groups.group_service','groups.group_emp','groups.driver','groups.team_leader')
                    ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
                    ->leftjoin('surveys','surveys.job_id','=','jobs.id')
                    ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
                    ->leftjoin('groups','groups.id','=','job_groups.group_id')
                    ->where('surveys.surveyor_emp_id',$id)
                    ->orderBy('jobs.id','asc')->get();
        foreach($data['alljobs'] as $jbt){
            $groupser = explode(',',$jbt->service_id);
            $jbt['ser'] = Service::select(\DB::raw("(GROUP_CONCAT(DISTINCT service_name SEPARATOR ',')) as 'ser_name' "))->whereIn('id',$groupser)->first();
           
            $total = explode(',',$jbt->group_emp);
           //print_r($total);die;
            $empArr = array($jbt->team_leader,$jbt->driver);
           //print_r($empArr);die;
            $totalEmp = array_unique(array_merge($total,$empArr));
            
            if(isset($totalEmp[0]) && !empty($totalEmp[0])){
               $total_emp = count($totalEmp);
            }else{
               $total_emp = 0;
            }
            $jbt['total_emp'] = $total_emp;
        }
        $data['job'] = Jobs::select('jobs.id','amcs.address','surveys.surveyor_emp_id','job_groups.vehicle_id')
                    ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
                    ->leftjoin('surveys','surveys.job_id','=','jobs.id')
                    ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
                    ->where('surveys.surveyor_emp_id',$id)
                    ->orderBy('jobs.id','desc')->first();
        
                    $vehicle_no = JobGroup::select('group_id','vehicle_id')->where('job_id','=',$data['job']['id'])->first();
                    if(isset($vehicle_no) && !empty($vehicle_no)){
                            if($vehicle_no == ''){
                                $d['job']['vehicle_no'] = 'Not Assign';
                            }else{
                                if($vehicle_no->group_id == 0 || $vehicle_no->group_id== null){
        
                                    $vehicle = Group::select('groups.group_vehicle','groups.group_emp','vehicles.vehicle_no')
                                    ->leftjoin('vehicles','vehicles.id','=','groups.group_vehicle')
                                    ->where('groups.id','=',$vehicle_no->vehicle_id)->first();
                                   // print_r($vehicle); 
                                   if(isset($vehicle) && !empty($vehicle)){
                                        $d['job']['vehicle_no'] = $vehicle->vehicle_no;
                                   }else{
                                        $d['job']['vehicle_no'] = 'Not Assign';
                                   }
                                    
                                }else{
                                    $vehicle = Group::select('groups.group_vehicle','groups.group_emp','vehicles.vehicle_no')
                                    ->leftjoin('vehicles','vehicles.id','=','groups.group_vehicle')
                                    ->where('groups.id','=',$vehicle_no->group_id)->first();
            
                                if(isset($vehicle) && !empty($vehicle)){
                                        $d['job']['vehicle_no'] = $vehicle->vehicle_no;
                                   }else{
                                        $d['job']['vehicle_no'] = 'Not Assign';
                                   }
                                }
                                
                            }
                    }else{
                        $vehicle_no = '';
                    }
        if(!empty($data)){
            return $data;
        }else{
            return false;
        }
    }

    static function getEmpOrderDEtail($order_id,$id){

        $data = Employee::Select('employees.*','emp_services.service_id',\DB::raw('group_concat(services.service_name) as service_name'))
                ->leftJoin('emp_services','emp_services.employee_id','=','employees.id')
                ->leftJoin('services','services.id','=','emp_services.service_id')
                ->where('employees.id','=',$id)
                ->first();

        $data['total_jobs'] = Survey::Select(\DB::raw('COUNT(id) as total_jobs'))->where('surveyor_emp_id',$id)->first();
        $month = date('m');
        $year = date('Y');
        $day = date('d');
        $data['currentmonth_jobs'] = Survey::Select(\DB::raw('COUNT(id) as currentmonth_jobs'))->whereRaw('MONTH(servey_date) = ?',[$month])->where('surveyor_emp_id',$id)->first();
        $current_status = Survey::whereRaw('YEAR(servey_date) > ?',[$year])
                                ->whereRaw('MONTH(servey_date) > ?',[$month])
                                ->whereRaw('DAY(servey_date) > ?',[$day])
                                ->where('surveyor_emp_id',$id)->first();
                              
        if($current_status == ''){ 
            $data['currentStatus'] = 'Available';
        }else{
            $data['currentStatus'] = 'Unavailable';
        }
        $data['alljobs'] = Jobs::select('jobs.*','users.firstname','users.lastname','users.email','users.mobile','users.profile_pic','amcs.address','surveys.surveyor_emp_id','job_groups.group_id','job_groups.vehicle_id','groups.group_service','groups.group_emp')
                    ->leftjoin('users','users.id','=','jobs.user_id')
                    ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
                    ->leftjoin('surveys','surveys.job_id','=','jobs.id')
                    ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
                    ->leftjoin('groups','groups.id','=','job_groups.group_id')
                    ->where('surveys.surveyor_emp_id',$id)
                    ->where('jobs.id','=',$order_id)
                    ->first();
        $data['alljobs']['surveyerdetail'] = Survey::Select('surveys.*','employees.emp_profile','employees.employee_name','employees.emp_mobile','employees.emp_role','slots.slot_timename','slots.slotstart_time','slots.slotend_time')
                            ->leftjoin('employees','employees.id','=','surveys.surveyor_emp_id')
                            ->leftjoin('slots','slots.id','=','surveys.survey_slot_id')
                            ->where('surveys.job_id','=',$data['alljobs']->id)
                            ->first();
        
        $data['alljobs']['reportservice'] = SurveyorReport::select('surveyor_reports.service_id','surveyor_reports.service_img','services.service_name')
                            ->leftjoin('services','services.id','=','surveyor_reports.service_id')
                            ->where('surveyor_reports.job_id','=',$data['alljobs']->id)
                            ->groupBy('surveyor_reports.service_id')
                            ->get();

        $service_id = explode(',',$data['alljobs']->service_id);
                        
            $jobServices = JobService::select('job_services.specify_problem','job_services.additional_notes','job_services.service_image','job_services.created_at','services.service_name')
                        ->leftjoin('services','services.id','=','job_services.service_id')
                        ->where('job_id','=',$data['alljobs']->id)
                        ->whereIn('service_id',$service_id)
                        ->get();
            
        $data['alljobs']['jobServices'] = $jobServices;
                        
        
        $data['job'] = Jobs::select('jobs.id','amcs.address','surveys.surveyor_emp_id','job_groups.vehicle_id')
                    ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
                    ->leftjoin('surveys','surveys.job_id','=','jobs.id')
                    ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
                    ->where('surveys.surveyor_emp_id',$id)
                    ->orderBy('jobs.id','desc')->first();
        
                    $vehicle_no = JobGroup::select('group_id','vehicle_id')->where('job_id','=',$data['job']['id'])->first();
                    
                    if(isset($vehicle_no) && !empty($vehicle_no)){
                            if($vehicle_no == ''){
                                $data['job']['vehicle_no'] = 'Not Assign';
                                $data['vehicle_detail'] = '';
                            }else{
                                if($vehicle_no->group_id == 0 || $vehicle_no->group_id== null){
        
                                    $vehicle = Group::select('groups.group_vehicle','groups.group_emp','groups.driver','employees.employee_name','employees.emp_profile','employees.emp_role','employees.emp_mobile','vehicles.vehicle_no','vehicles.vehicle_type','vehicles.modal_no')
                                    ->leftjoin('employees','employees.id','=','groups.driver')
                                    ->leftjoin('vehicles','vehicles.id','=','groups.group_vehicle')
                                    ->where('groups.id','=',$vehicle_no->vehicle_id)->first();
                                   // print_r($vehicle); 
                                   if(isset($vehicle) && !empty($vehicle)){
                                        $data['vehicle_detail'] = $vehicle;
                                        $data['job']['vehicle_no'] = $vehicle->vehicle_no;

                                        $total = explode(',',$vehicle->group_emp);
                                        $total_emp = count($total);
                                        $data['alljobs']['total_emp'] = $total_emp + 2;

                                        $arr = array();
                                        foreach($total as $t){
                                        $team_member = \DB::table('employees')->select('employees.employee_name','employees.emp_profile','employees.emp_role','employees.emp_mobile')
                                                            ->where('employees.id','=',$t)                    
                                                            ->first();
                                                            array_push($arr,$team_member);
                                        }
                                        $data['team_member'] = $arr;
                                       // prd($data['team_member']);
                                   }else{
                                        $data['job']['vehicle_no'] = 'Not Assign';
                                   }
                                    
                                }else{
                                    $vehicle = Group::select('groups.group_vehicle','groups.group_emp','groups.driver','employees.employee_name','employees.emp_profile','employees.emp_role','employees.emp_mobile','vehicles.vehicle_no','vehicles.vehicle_type','vehicles.modal_no')
                                    ->leftjoin('employees','employees.id','=','groups.driver')
                                    ->leftjoin('vehicles','vehicles.id','=','groups.group_vehicle')
                                    ->where('groups.id','=',$vehicle_no->group_id)->first();
            
                                if(isset($vehicle) && !empty($vehicle)){
                                        $data['vehicle_detail'] = $vehicle;
                                        $data['job']['vehicle_no'] = $vehicle->vehicle_no;

                                        $total = explode(',',$vehicle->group_emp);
                                        $total_emp = count($total);
                                        $data['alljobs']['total_emp'] = $total_emp + 2;

                                        $arr = array();
                                        foreach($total as $t){
                                        $team_member = \DB::table('employees')->select('employees.employee_name','employees.emp_profile','employees.emp_role','employees.emp_mobile')
                                                            ->where('employees.id','=',$t)                    
                                                            ->first();
                                                            array_push($arr,$team_member);
                                        }
                                        $data['team_member'] = $arr;
                                        //prd($data['alljobs']['total_emp']);
                                   }else{
                                        $data['job']['vehicle_no'] = 'Not Assign';
                                   }
                                }
                                
                            }
                    }else{
                        $vehicle_no = '';
                    }
        
        if(!empty($data)){
            return $data;
        }else{
            return false;
        }
    }

    public static function InsertEmployee($data,$picture, $passport_doc,$visa_doc, $emirates_copy, $licence_copy) {
       //prd($data);
        $date = date('Y-m-d', strtotime($data['date_of_birth']));
        //$date1 = date('Y-m-d', strtotime($data['licence_exp_date']));
        $date2 = date('Y-m-d', strtotime($data['passport_exp_date']));
        $date3 = date('Y-m-d', strtotime($data['visa_expiration']));
        $date4 = date('Y-m-d', strtotime($data['emirates_exp_date']));
        
        $insert = new Employee();
        $insert->emp_profile = (isset($picture)) ? $picture: NULL;
        $insert->emp_role = (isset($data['emp_role'])) ? $data['emp_role'] : '';
        $insert->employee_code = (isset($data['employee_code'])) ? $data['employee_code'] : NULL;
        $insert->employee_name = (isset($data['employee_name'])) ? $data['employee_name'] : NULL;
        $insert->emp_mobile = (isset($data['emp_mobile'])) ? $data['emp_mobile'] : NULL;
        $insert->date_of_birth = (isset($date)) ? $date : null;
        $insert->age = (isset($data['age'])) ? $data['age'] : NULL;
        $insert->email_id = (isset($data['email_id'])) ? $data['email_id'] : NULL;
        $insert->country = (isset($data['country'])) ? $data['country'] : NULL;
        $insert->city = (isset($data['city'])) ? $data['city'] : NULL;
        $insert->nationality = (isset($data['nationality'])) ? $data['nationality'] : NULL;
        $insert->local_address = (isset($data['local_address'])) ? $data['local_address'] : NULL;
        $insert->permanent_address = (isset($data['permanent_address'])) ? $data['permanent_address'] : NULL;
        $insert->vehicle_type = (isset($data['vehicle_type'])) ? $data['vehicle_type'] : NULL;
        $insert->licence_type = (isset($data['licence_type'])) ? $data['licence_type'] : NULL;
        $insert->driving_licence_number = (isset($data['driving_licence_number'])) ? $data['driving_licence_number'] : NULL;
        //$insert->licence_exp_date = (isset($datae1)) ? $datae1 : NULL;
        $insert->driving_licence_number = (isset($data['driving_licence_number'])) ? $data['driving_licence_number'] : NULL;
        $insert->passport_exp_date = (isset($date2)) ? $date2 : NULL;
        $insert->visa_expiration = (isset($date3)) ? $date3 : NULL;
        $insert->emirates_id = (isset($data['emirates_id'])) ? $data['emirates_id'] : NULL;
        $insert->passport_number = (isset($data['passport_number'])) ? $data['passport_number'] : NULL;
        $insert->emirates_exp_date = (isset($date4)) ? $date4 : NULL;
        $insert->passport_doc = (isset($passport_doc)) ? $passport_doc : NULL;
        $insert->visa_doc = (isset($visa_doc)) ? $visa_doc : NULL;
        $insert->emirates_id_copy = (isset($emirates_copy)) ? $emirates_copy : NULL;
        $insert->driving_licence_copy = (isset($licence_copy)) ? $licence_copy: NULL;
        $insert->status = (isset($data['status'])) ? $data['status'] : NULL;
        //prd($insert);
        $save = $insert->save();
        if ($save) {
            $insert_id = $insert->id;
            return $insert_id;
        }else{
            return false;
        }
    }


    public static function updateEmployee($data, $id, $picture, $passport_doc,$visa_doc, $emirates_copy, $licence_copy) {
        
        $date = date('Y-m-d', strtotime($data['date_of_birth']));
       //$date1 = date('Y-m-d', strtotime($data['licence_exp_date']));
        $date2 = date('Y-m-d', strtotime($data['passport_exp_date']));
        $date3 = date('Y-m-d', strtotime($data['visa_expiration']));
        $date4 = date('Y-m-d', strtotime($data['emirates_exp_date']));
        //prd($picture);
        $update = static::where('id', $id)->first();
        $update->emp_profile = (isset($picture)) ? $picture: NULL;
        $update->emp_role = (isset($data['emp_role'])) ? $data['emp_role'] : '';
        $update->employee_code = (isset($data['employee_code'])) ? $data['employee_code'] : NULL;
        $update->employee_name = (isset($data['employee_name'])) ? $data['employee_name'] : NULL;
        $update->emp_mobile = (isset($data['emp_mobile'])) ? $data['emp_mobile'] : NULL;
        $update->date_of_birth = (isset($date)) ? $date : null;
        $update->age = (isset($data['age'])) ? $data['age'] : NULL;
        $update->email_id = (isset($data['email_id'])) ? $data['email_id'] : NULL;
        $update->country = (isset($data['country'])) ? $data['country'] : NULL;
        $update->city = (isset($data['city'])) ? $data['city'] : NULL;
        $update->nationality = (isset($data['nationality'])) ? $data['nationality'] : NULL;
        $update->local_address = (isset($data['local_address'])) ? $data['local_address'] : NULL;
        $update->permanent_address = (isset($data['permanent_address'])) ? $data['permanent_address'] : NULL;
        $update->vehicle_type = (isset($data['vehicle_type'])) ? $data['vehicle_type'] : NULL;
        $update->licence_type = (isset($data['licence_type'])) ? $data['licence_type'] : NULL;
        $update->driving_licence_number = (isset($data['driving_licence_number'])) ? $data['driving_licence_number'] : NULL;
        //$update->licence_exp_date = (isset($datae1)) ? $datae1 : NULL;
        $update->driving_licence_number = (isset($data['driving_licence_number'])) ? $data['driving_licence_number'] : NULL;
        $update->passport_exp_date = (isset($date2)) ? $date2 : NULL;
        $update->visa_expiration = (isset($date3)) ? $date3 : NULL;
        $update->emirates_id = (isset($data['emirates_id'])) ? $data['emirates_id'] : NULL;
        $update->passport_number = (isset($data['passport_number'])) ? $data['passport_number'] : NULL;
        $update->emirates_exp_date = (isset($date4)) ? $date4 : NULL;
        $update->passport_doc = (isset($passport_doc)) ? $passport_doc : NULL;
        $update->visa_doc = (isset($visa_doc)) ? $visa_doc : NULL;
        $update->emirates_id_copy = (isset($emirates_copy)) ? $emirates_copy : NULL;
        $update->driving_licence_copy = (isset($licence_copy)) ? $licence_copy: NULL;
        $update->status = (isset($data['status'])) ? $data['status'] : NULL;
       // prd($update->toArray());
        $save = $update->save();
        if ($save) {
            return $update;
        }else{
            return false;
        }
    }

    public static function getTeamLeader($team_leader){

        $data = static::select('employee_name','employee_code','emp_profile','emp_role','emp_mobile')
                ->where('id','=',$team_leader)
                ->first();
        if(isset($data) && !empty($data)){
            return $data;
        }else{
            return false;
        }
    }

    public static function getDriver($driver){
        
        $data = static::select('employee_name','employee_code','emp_profile','emp_role')
                ->where('id','=',$driver)
                ->first();
        if(isset($data) && !empty($data)){
            return $data;
        }else{
            return false;
        }
    }

    public static function getEmployee($employees){
            $em_id = explode(',',$employees);
            $data = static::select('id','employee_name')->whereIn('id',$em_id)->get();
          
        if(isset($data) && !empty($data)){
            return $data;
        }else{
            return false;
        }
    }
}
