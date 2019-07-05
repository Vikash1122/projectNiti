<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Survey;
use App\Service;
use App\SubServices;
use App\JobService;
use App\SurveyorReport;
use DB;

class Jobs extends Model
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
    
    public static function getJobDataDate($date){
            $myarray = array();
            
            $data = static::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time')
            ->leftjoin('users','users.id','=','jobs.user_id')
            ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
            ->leftjoin('slots','slots.id','=','jobs.job_slot')
            //->where('jobs.user_id','=',$input['user_id'])
            ->where('jobs.job_date','=',$date)
            ->orderBy('jobs.job_slot','asc')
            ->groupBy('jobs.id')
            ->get();
            foreach($data as $d){
        
                $service_id = explode(',',$d->service_id);
                
                $servicedata = Service::Select('id','service_name','service_code','instant_service_price','surveyer_price','service_icon')
                                ->whereIn('id',$service_id)
                                ->get();
                foreach($servicedata as $sd){
                    $jobServices = JobService::select('specify_problem','additional_notes','service_image')
                                //->join('services','services.id','=','job_services.service_id')
                                ->where('job_id','=',$d->id)
                                ->where('service_id','=',$sd->id)
                                ->first();

                                $sd['jobServices'] = $jobServices;
                }
                // $jobServices = JobService::select('specify_problem','additional_notes','service_image')
                //                 //->join('services','services.id','=','job_services.service_id')
                //                 ->where('job_id','=',$d->id)
                //                 ->get();
                
                    foreach($servicedata as $ser){
                        if(isset($ser['service_icon']) && !empty($ser['service_icon'])){
                            $eurl = 'http://3.16.87.53/public/uploads/services/'.$ser['service_icon'];
                        
                            $ser['eurl'] = $eurl;
                        }else{
                            $ser['eurl'] = '';
                        }
                        
                    }
                 //print_r($servicedata);
                $d['services'] = $servicedata;
                
                array_push($myarray,$data);
            }
            //prd($data->toArray());


        if(isset($data) && !empty($data)){
            return $data;
        }else{
            return false;
        }
    }


    public static function getJobDatatype($service_type){
        $myarray = array();
        
        $data = static::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time')
        ->leftjoin('users','users.id','=','jobs.user_id')
        ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
        ->leftjoin('slots','slots.id','=','jobs.job_slot')
        //->where('jobs.user_id','=',$input['user_id'])
        ->where('jobs.service_type','=',$service_type)
        ->orderBy('jobs.job_slot','asc')
        ->groupBy('jobs.id')
        ->get();
        foreach($data as $d){
    
            $service_id = explode(',',$d->service_id);
            
            $servicedata = Service::Select('id','service_name','service_code','instant_service_price','surveyer_price','service_icon')
                            ->whereIn('id',$service_id)
                            ->get();
            foreach($servicedata as $sd){
                $jobServices = JobService::select('specify_problem','additional_notes','service_image')
                            //->join('services','services.id','=','job_services.service_id')
                            ->where('job_id','=',$d->id)
                            ->where('service_id','=',$sd->id)
                            ->first();

                            $sd['jobServices'] = $jobServices;
            }
                foreach($servicedata as $ser){
                    if(isset($ser['service_icon']) && !empty($ser['service_icon'])){
                        $eurl = 'http://3.16.87.53/public/uploads/services/'.$ser['service_icon'];
                    
                        $ser['eurl'] = $eurl;
                    }else{
                        $ser['eurl'] = '';
                    }
                    
                }
             //print_r($servicedata);
            $d['services'] = $servicedata;
            
            array_push($myarray,$data);
        }
        //prd($data->toArray());


    if(isset($data) && !empty($data)){
        return $data;
    }else{
        return false;
    }
}


    public static function getAllJobs(){
        $myarray = array();
        
        $data = static::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time')
        ->leftjoin('users','users.id','=','jobs.user_id')
        ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
        ->leftjoin('slots','slots.id','=','jobs.job_slot')
        ->where('jobs.status','=',1)
        ->groupBy('jobs.id')
        ->get();
        foreach($data as $d){
    
            $d['surveyerdetail'] = Survey::Select('surveys.*','employees.emp_profile','employees.employee_name','employees.emp_mobile','slots.slot_timename','slots.slotstart_time','slots.slotend_time')
                            ->leftjoin('employees','employees.id','=','surveys.surveyor_emp_id')
                            ->leftjoin('slots','slots.id','=','surveys.survey_slot_id')
                            ->where('surveys.job_id','=',$d->id)
                            ->first();

            $service_id = explode(',',$d->service_id);
            
            $servicedata = Service::Select('id','service_name','service_code','instant_service_price','surveyer_price','service_icon')
                            ->whereIn('id',$service_id)
                            ->get();
            foreach($servicedata as $sd){
                $jobServices = JobService::select('specify_problem','additional_notes','service_image')
                            //->join('services','services.id','=','job_services.service_id')
                            ->where('job_id','=',$d->id)
                            ->where('service_id','=',$sd->id)
                            ->first();

                            $sd['jobServices'] = $jobServices;
            }
                foreach($servicedata as $ser){
                    if(isset($ser['service_icon']) && !empty($ser['service_icon'])){
                        $eurl = 'http://3.16.87.53/public/uploads/services/'.$ser['service_icon'];
                    
                        $ser['eurl'] = $eurl;
                    }else{
                        $ser['eurl'] = '';
                    }
                    
                }
             //print_r($servicedata);
            $d['services'] = $servicedata;
            
            array_push($myarray,$data);
        }
        //prd($data->toArray());

        if(isset($data) && !empty($data)){
            return $data;
        }else{
            return false;
        }
    }


    public static function getAllJobsStatus($status_id){
        $myarray = array();
        
        $data = static::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time')
        ->leftjoin('users','users.id','=','jobs.user_id')
        ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
        ->leftjoin('slots','slots.id','=','jobs.job_slot')
        //->where('jobs.surveyor_status','=',1)
        ->where('jobs.status','=',$status_id)
        ->groupBy('jobs.id')
        ->get();
        foreach($data as $d){
    
            $d['surveyerdetail'] = Survey::Select('surveys.*','employees.emp_profile','employees.employee_name','employees.emp_mobile','slots.slot_timename','slots.slotstart_time','slots.slotend_time')
                            ->leftjoin('employees','employees.id','=','surveys.surveyor_emp_id')
                            ->leftjoin('slots','slots.id','=','surveys.survey_slot_id')
                            ->where('surveys.job_id','=',$d->id)
                            ->first();

            $service_id = explode(',',$d->service_id);
            
            $servicedata = Service::Select('id','service_name','service_code','instant_service_price','surveyer_price','service_icon')
                            ->whereIn('id',$service_id)
                            ->get();
            foreach($servicedata as $sd){
                $jobServices = JobService::select('specify_problem','additional_notes','service_image')
                            //->join('services','services.id','=','job_services.service_id')
                            ->where('job_id','=',$d->id)
                            ->where('service_id','=',$sd->id)
                            ->first();

                            $sd['jobServices'] = $jobServices;
            }
                foreach($servicedata as $ser){
                    if(isset($ser['service_icon']) && !empty($ser['service_icon'])){
                        $eurl = 'http://3.16.87.53/public/uploads/services/'.$ser['service_icon'];
                    
                        $ser['eurl'] = $eurl;
                    }else{
                        $ser['eurl'] = '';
                    }
                    
                }
             //print_r($servicedata);
            $d['services'] = $servicedata;
            
            array_push($myarray,$data);
        }
        //prd($data->toArray());

        if(isset($data) && !empty($data)){
            return $data;
        }else{
            return false;
        }
    }


    public static function allCompleteJobs(){
        $myarray = array();
        $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','job_groups.employee_id','job_groups.employee_role','job_groups.slot_id','job_groups.vehicle_id','groups.group_name')
            ->leftjoin('users','users.id','=','jobs.user_id')
            ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
            ->leftjoin('slots','slots.id','=','jobs.job_slot')
            ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
            ->leftjoin('groups','groups.id','=','job_groups.group_id')
            ->where('jobs.status','=',8)
            ->groupBy('jobs.id')
            ->get();
            $empty_arr = array() ;
            $return_arr = array() ;
        foreach($data as $k=>$d){
            $return_arr[$k]['id'] = $d['id'] ;
            $return_arr[$k]['user_id'] = $d['user_id'] ;
            $return_arr[$k]['amc_id'] = $d['amc_id'] ;
            $return_arr[$k]['service_id'] = $d['service_id'] ;
            $return_arr[$k]['job_date'] = $d['job_date'] ;
            $return_arr[$k]['service_type'] = $d['service_type'] ;
            $return_arr[$k]['job_slot'] = $d['job_slot'] ;
            $return_arr[$k]['status'] = $d['status'] ;
            $return_arr[$k]['surveyor_status'] = $d['surveyor_status'];
            $return_arr[$k]['firstname'] = $d['firstname'];
            $return_arr[$k]['lastname'] = $d['lastname'];
            $return_arr[$k]['title'] = $d['title'];
            $return_arr[$k]['address'] = $d['address'];
            $return_arr[$k]['mobile'] = $d['mobile'];
            $return_arr[$k]['profile_pic'] = $d['profile_pic'];
            $return_arr[$k]['title'] = $d['title'];
            $return_arr[$k]['slot_name'] = $d['slot_name'];
            $return_arr[$k]['slotstart_time'] = $d['slotstart_time'];
            $return_arr[$k]['slotend_time'] = $d['slotend_time'];
            $return_arr[$k]['group_id'] = $d['group_id'];
            $return_arr[$k]['group_name'] = $d['group_name'];
            $return_arr[$k]['updated_at'] = $d['updated_at'];
            

            $service_id = explode(',',$d->service_id);
            $service_id = explode(',',$d->service_id);
            $services = Service::select(\DB::raw("(GROUP_CONCAT(DISTINCT service_name SEPARATOR ',')) as 'ser_name' "))
                    ->whereIn('id',$service_id)
                    ->first();

        $return_arr[$k]['servc'] = Service::select('service_name','service_icon')
                    ->whereIn('id',$service_id)
                    ->get();
            $return_arr[$k]['services'] = $services->ser_name;  
            if(isset($d->group_id) && !empty($d->group_id)){
                $groupData = Group::select('groups.*','vehicles.vehicle_no')
                ->join('vehicles','vehicles.id','=','groups.group_vehicle')
                ->where('groups.id','=',$d->group_id)
                ->first();
                    $tl = $groupData['team_leader'];
                    $dr = $groupData['driver'];
                    $total = explode(',',$groupData['group_emp']);
                    $total_emp = count($total);
                    $groupData['total_emp'] = $total_emp + 2; /** 2 for team leader and driver */
                    //prd($groupData['team_leader']);
                    $groupser = explode(',',$groupData['group_service']);
                    $ser = Service::select(\DB::raw("(GROUP_CONCAT(DISTINCT service_name SEPARATOR ',')) as 'ser_name' "))->whereIn('id',$groupser)->first();
                    // concat gruop 
                    $groupData['services'] = $ser->ser_name;
                    $teamleader = Employee::getTeamLeader($tl);
                    $groupData['teamleader'] = $teamleader['employee_name'];
                    $groupData['teamleader_image'] = $teamleader['emp_profile'];
                    $driver = Employee::getDriver($dr);
                    $groupData['drivername'] = $driver['employee_name'];
                    $groupData['driver_image'] = $driver['emp_profile'];
                    
                    $return_arr[$k]['group'] = $groupData;
            }else{
                $return_arr[$k]['group'] = '';
                $teamleader = Employee::getTeamLeader($d->employee_id);
                $return_arr[$k]['empName'] = $teamleader['employee_name'];
                $return_arr[$k]['empIMG'] = $teamleader['emp_profile'];
                $return_arr[$k]['employee_role'] = $teamleader['emp_role'];
                $slots = Slot::select('slots.slot_timename','slots.slotstart_time','slots.slotend_time')
                        ->where('id','=',$d->slot_id)
                        ->first();
                $return_arr[$k]['gp_slot'] = $slots['slot_timename'];
                $return_arr[$k]['gp_slotstart_time'] = $slots['slotstart_time'];
                $return_arr[$k]['gp_slotend_time'] = $slots['slotend_time'];
            }
            
            //array_push($return_arr,$data);
        }

        if(isset($return_arr) && !empty($return_arr)){
            return $return_arr;
        }else{
            return false;
        }
    }

    public static function generateInvoice($id){
        $myarray = array();
        $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.email','users.profile_pic','amcs.title','amcs.address','amcs.type as amc_type','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','job_groups.employee_id','job_groups.employee_role','job_groups.slot_id','job_groups.vehicle_id','groups.group_name')
            ->leftjoin('users','users.id','=','jobs.user_id')
            ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
            ->leftjoin('slots','slots.id','=','jobs.job_slot')
            ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
            ->leftjoin('groups','groups.id','=','job_groups.group_id')
            ->where('jobs.status','=',8)
            ->where('jobs.id',$id)
            ->groupBy('jobs.id')
            ->first();

            $data['serviceData'] = \DB::table('job_proposals')->select('job_proposals.*','services.service_name')
                    ->leftjoin('services','services.id','=','job_proposals.service_id')
                    ->where('job_proposals.job_id','=',$id)
                    ->groupBy('job_proposals.service_id')
                    ->get();
                
            foreach($data['serviceData'] as $d){
                $d->job_proposal = \DB::table('job_proposals')
                                        ->select('job_proposals.*','sub_services.sub_service_name','products.product_name','job_cards.qty','job_cards.unit_variable')
                                        ->leftjoin('sub_services','sub_services.id','=','job_proposals.sub_service_id')
                                        ->leftjoin('products','products.id','=','job_proposals.product_id')
                                        ->leftjoin('job_cards','job_cards.sub_service_id','job_proposals.sub_service_id')
                                        ->where('job_proposals.service_id',$d->service_id)
                                        ->where('job_proposals.job_id',$d->job_id)
                                        ->groupBy('job_proposals.sub_service_id')
                                        ->get();   

            }
//prd($data->toArray());
        if(isset($data) && !empty($data)){
            return $data;
        }else{
            return false;
        }
    }


    /**ORDER DEATILS PAGE START */
    public static function vieworderDetail($id){

        $myarray = array();
        $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','amcs.type as amc_type','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','groups.group_name','groups.group_emp','groups.team_leader','groups.driver')
            ->leftjoin('users','users.id','=','jobs.user_id')
            ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
            ->leftjoin('slots','slots.id','=','jobs.job_slot')
            ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
            ->leftjoin('groups','groups.id','=','job_groups.group_id')
            ->where('jobs.id','=',$id)
            ->first();
            $group_emp = explode(',',$data->group_emp);
            $empArr = array($data->team_leader,$data->driver);
            $totalEmp = array_unique(array_merge($group_emp,$empArr));
            $total_emp = count($totalEmp);
            $data['teamMember'] = DB::table('employees')
                    ->select('employees.id','employees.emp_profile','employees.employee_name','employees.emp_mobile','employees.emp_role')
                    ->whereIn('employees.id',$totalEmp)
                    ->get();
               // prd($data->toArray());die;
           

            $service_id = explode(',',$data->service_id);
            $serices = Service::select(\DB::raw("(GROUP_CONCAT(DISTINCT service_name SEPARATOR ', ')) as 'ser_name' "))->whereIn('id',$service_id)->first();
            $data['service'] = $serices->ser_name;
            //prd($serices->toArray());
            $servicedata = Service::Select('id','service_name','service_code','instant_service_price','surveyer_price','service_icon')
                            ->whereIn('id',$service_id)
                            ->get();
            foreach($servicedata as $sd){
                $jobServices = JobService::select('specify_problem','additional_notes','service_image')
                            //->join('services','services.id','=','job_services.service_id')
                            ->where('job_id','=',$data->id)
                            ->where('service_id','=',$sd->id)
                            ->first();

                            $sd['jobServices'] = $jobServices;
            }
                foreach($servicedata as $ser){
                    if(isset($ser['service_icon']) && !empty($ser['service_icon'])){
                        $eurl = 'http://3.16.87.53/public/uploads/services/'.$ser['service_icon'];
                    
                        $ser['eurl'] = $eurl;
                    }else{
                        $ser['eurl'] = '';
                    }
                    
                }
             //print_r($servicedata);
            $data['services'] = $servicedata;
            if(isset($data->group_id) && !empty($data->group_id)){
                //prd($d->group_id);
                $groupData = Group::select('groups.*','vehicles.vehicle_no')
                ->join('vehicles','vehicles.id','=','groups.group_vehicle')
                ->where('groups.id','=',$data->group_id)
                ->first();
               
                    $tl = $groupData['team_leader'];
                    $dr = $groupData['driver'];
                    $arr6 = array($tl,$dr);
                    $total = explode(',',$groupData['group_emp']);
                    $tt = array_unique(array_merge($arr6,$total));
                    $total_emp = count($tt);
                    $groupData['total_emp'] = $total_emp; /** 2 for team leader and driver */
                    
                    // $groupser = explode(',',$groupData['group_service']);
                    // $ser = Service::select(\DB::raw("(GROUP_CONCAT(DISTINCT service_name SEPARATOR ',')) as 'ser_name' "))->whereIn('id',$groupser)->first();
                    // // concat gruop 
                    // $groupData['services'] = $ser->ser_name;
                    $teamleader = Employee::getTeamLeader($tl);
                    $groupData['teamleader'] = $teamleader['employee_name'];
                    $groupData['leaderMobile'] = $teamleader['emp_mobile'];
                    $groupData['teamleader_image'] = $teamleader['emp_profile'];
                    $driver = Employee::getDriver($dr);
                    $groupData['drivername'] = $driver['employee_name'];
                    $groupData['driver_image'] = $driver['emp_profile'];
                    
                    $data['group'] = $groupData;
            }else{
                $data['group'] = '';
                $teamleader = Employee::getTeamLeader($data->employee_id);
                $data['empName'] = $teamleader['employee_name'];
                $data['empIMG'] = $teamleader['emp_profile'];
                $data['employee_role'] = $teamleader['emp_role'];
                $slots = Slot::select('slots.slot_timename','slots.slotstart_time','slots.slotend_time')
                        ->where('id','=',$data->slot_id)
                        ->first();
                $data['gp_slot'] = $slots['slot_timename'];
                $data['gp_slotstart_time'] = $slots['slotstart_time'];
                $data['gp_slotend_time'] = $slots['slotend_time'];
            }
           
        if(isset($data) && !empty($data)){
            return $data;
        }else{
            return false;
        }
    }
    /**ORDER DEATILS PAGE END */
}
