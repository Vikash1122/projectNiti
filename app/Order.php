<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Jobs;
use App\Survey;
use App\Service;
use App\JobService;
use App\SurveyorReport;

class Order extends Model
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
    
    public static function getAllOrderData($amc_type){
        $myarray = array();
        $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','amcs.type as amc_type','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','job_groups.employee_id','job_groups.employee_role','job_groups.slot_id','job_groups.vehicle_id','groups.group_name')
            ->leftjoin('users','users.id','=','jobs.user_id')
            ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
            ->leftjoin('slots','slots.id','=','jobs.job_slot')
            ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
            ->leftjoin('groups','groups.id','=','job_groups.group_id')
            ->where('amcs.type','=',$amc_type)
            ->where('jobs.status','!=',0)
            ->where('jobs.status','!=',1)
            ->where('jobs.status','!=',2)
            //->where('jobs.status','!=',3)
            ->groupBy('jobs.id')
            ->get();
           // prd($data->toArray());
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
            $return_arr[$k]['amc_type'] = $d['amc_type'];
            $return_arr[$k]['mobile'] = $d['mobile'];
            $return_arr[$k]['profile_pic'] = $d['profile_pic'];
            $return_arr[$k]['title'] = $d['title'];
            $return_arr[$k]['slot_name'] = $d['slot_name'];
            $return_arr[$k]['slotstart_time'] = $d['slotstart_time'];
            $return_arr[$k]['slotend_time'] = $d['slotend_time'];
            $return_arr[$k]['group_id'] = $d['group_id'];
            $return_arr[$k]['group_name'] = $d['group_name'];

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
             $return_arr[$k]['services'] = $servicedata;
            if(isset($d->group_id) && !empty($d->group_id)){
                //prd($d->group_id);
                $groupData = Group::select('groups.*','vehicles.vehicle_no')
                ->join('vehicles','vehicles.id','=','groups.group_vehicle')
                ->where('groups.id','=',$d->group_id)
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
        }//die();
        //prd($data->toArray());

        if(isset($return_arr) && !empty($return_arr)){
            return $return_arr;
        }else{
            return false;
        }
    }

    public static function allOrderFilterStatus($amc_type,$status){
        $myarray = array();
        $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','amcs.type as amc_type','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','job_groups.employee_id','job_groups.employee_role','job_groups.slot_id','job_groups.vehicle_id','groups.group_name')
            ->leftjoin('users','users.id','=','jobs.user_id')
            ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
            ->leftjoin('slots','slots.id','=','jobs.job_slot')
            ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
            ->leftjoin('groups','groups.id','=','job_groups.group_id')
            ->where('amcs.type','=',$amc_type)
            ->where('jobs.status','=',$status)
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
            $return_arr[$k]['amc_type'] = $d['amc_type'];
            $return_arr[$k]['mobile'] = $d['mobile'];
            $return_arr[$k]['profile_pic'] = $d['profile_pic'];
            $return_arr[$k]['title'] = $d['title'];
            $return_arr[$k]['slot_name'] = $d['slot_name'];
            $return_arr[$k]['slotstart_time'] = $d['slotstart_time'];
            $return_arr[$k]['slotend_time'] = $d['slotend_time'];
            $return_arr[$k]['group_id'] = $d['group_id'];
            $return_arr[$k]['group_name'] = $d['group_name'];

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
             $return_arr[$k]['services'] = $servicedata;
            if(isset($d->group_id) && !empty($d->group_id)){
                //prd($d->group_id);
                $groupData = Group::select('groups.*','vehicles.vehicle_no')
                ->join('vehicles','vehicles.id','=','groups.group_vehicle')
                ->where('groups.id','=',$d->group_id)
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
        //prd($data->toArray());

        if(isset($return_arr) && !empty($return_arr)){
            return $return_arr;
        }else{
            return false;
        }
    }


    public static function allOrderFilterData($amc_type,$keyword,$searchDay,$searchdatakey){
        $myarray = array();
        if(isset($keyword) && !empty($keyword)){
            $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','amcs.type as amc_type','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','job_groups.employee_id','job_groups.employee_role','job_groups.slot_id','job_groups.vehicle_id','groups.group_name')
                ->leftjoin('users','users.id','=','jobs.user_id')
                ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
                ->leftjoin('slots','slots.id','=','jobs.job_slot')
                ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
                ->leftjoin('groups','groups.id','=','job_groups.group_id')
                ->where('users.firstname', 'LIKE', "%$keyword%")
                ->where('amcs.type','=',$amc_type)
                ->where('jobs.status','!=',0)
                ->where('jobs.status','!=',1)
                ->where('jobs.status','!=',2)
                //->where('jobs.status','!=',3)
                ->groupBy('jobs.id')
                ->get();
        }else if(isset($searchDay) && !empty($searchDay)){
            if($searchDay == 'All'){
                $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','amcs.type as amc_type','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','job_groups.employee_id','job_groups.employee_role','job_groups.slot_id','job_groups.vehicle_id','groups.group_name')
                ->leftjoin('users','users.id','=','jobs.user_id')
                ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
                ->leftjoin('slots','slots.id','=','jobs.job_slot')
                ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
                ->leftjoin('groups','groups.id','=','job_groups.group_id')
                ->where('amcs.type','=',$amc_type)
                ->where('jobs.status','!=',0)
                ->where('jobs.status','!=',1)
                ->where('jobs.status','!=',2)
                ->groupBy('jobs.id')
                ->get();
            }else{
                $date = date("Y-m-d");
                if($searchDay == '15 Days'){
                    $newDate = date("Y-m-d", strtotime("-15 day", strtotime($date)));
                }elseif($searchDay == '30 Days'){
                    $newDate = date("Y-m-d", strtotime("-30 day", strtotime($date)));
                }
                $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','amcs.type as amc_type','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','job_groups.employee_id','job_groups.employee_role','job_groups.slot_id','job_groups.vehicle_id','groups.group_name')
                ->leftjoin('users','users.id','=','jobs.user_id')
                ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
                ->leftjoin('slots','slots.id','=','jobs.job_slot')
                ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
                ->leftjoin('groups','groups.id','=','job_groups.group_id')
                ->whereBetween('jobs.created_at',[$newDate,$date])
                ->where('amcs.type','=',$amc_type)
                ->where('jobs.status','!=',0)
                ->where('jobs.status','!=',1)
                ->where('jobs.status','!=',2)
                ->groupBy('jobs.id')
                ->get();
            }
            
        }else if(isset($searchdatakey) && !empty($searchdatakey)){
            if($searchdatakey == 'All'){
                $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','amcs.type as amc_type','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','job_groups.employee_id','job_groups.employee_role','job_groups.slot_id','job_groups.vehicle_id','groups.group_name')
                ->leftjoin('users','users.id','=','jobs.user_id')
                ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
                ->leftjoin('slots','slots.id','=','jobs.job_slot')
                ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
                ->leftjoin('groups','groups.id','=','job_groups.group_id')
                ->where('amcs.type','=',$amc_type)
                ->where('jobs.status','!=',0)
                ->where('jobs.status','!=',1)
                ->where('jobs.status','!=',2)
                ->groupBy('jobs.id')
                ->get();
            }else{
                if($searchdatakey == 'Ascending'){
                    $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','amcs.type as amc_type','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','job_groups.employee_id','job_groups.employee_role','job_groups.slot_id','job_groups.vehicle_id','groups.group_name')
                    ->leftjoin('users','users.id','=','jobs.user_id')
                    ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
                    ->leftjoin('slots','slots.id','=','jobs.job_slot')
                    ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
                    ->leftjoin('groups','groups.id','=','job_groups.group_id')
                    ->where('amcs.type','=',$amc_type)
                    ->where('jobs.status','!=',0)
                    ->where('jobs.status','!=',1)
                    ->where('jobs.status','!=',2)
                    ->groupBy('jobs.id')
                    ->orderBy('jobs.id','asc')
                    ->get();
                }elseif($searchdatakey == 'Descending'){
                    $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','amcs.type as amc_type','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','job_groups.employee_id','job_groups.employee_role','job_groups.slot_id','job_groups.vehicle_id','groups.group_name')
                    ->leftjoin('users','users.id','=','jobs.user_id')
                    ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
                    ->leftjoin('slots','slots.id','=','jobs.job_slot')
                    ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
                    ->leftjoin('groups','groups.id','=','job_groups.group_id')
                    ->where('amcs.type','=',$amc_type)
                    ->where('jobs.status','!=',0)
                    ->where('jobs.status','!=',1)
                    ->where('jobs.status','!=',2)
                    ->groupBy('jobs.id')
                    ->orderBy('jobs.id','desc')
                    ->get();
                }
            }
            
        }
        
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
            $return_arr[$k]['amc_type'] = $d['amc_type'];
            $return_arr[$k]['mobile'] = $d['mobile'];
            $return_arr[$k]['profile_pic'] = $d['profile_pic'];
            $return_arr[$k]['title'] = $d['title'];
            $return_arr[$k]['slot_name'] = $d['slot_name'];
            $return_arr[$k]['slotstart_time'] = $d['slotstart_time'];
            $return_arr[$k]['slotend_time'] = $d['slotend_time'];
            $return_arr[$k]['group_id'] = $d['group_id'];
            $return_arr[$k]['group_name'] = $d['group_name'];

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
             $return_arr[$k]['services'] = $servicedata;
            if(isset($d->group_id) && !empty($d->group_id)){
                //prd($d->group_id);
                $groupData = Group::select('groups.*','vehicles.vehicle_no')
                ->join('vehicles','vehicles.id','=','groups.group_vehicle')
                ->where('groups.id','=',$d->group_id)
                ->first();
               
                    $tl = $groupData['team_leader'];
                    $dr = $groupData['driver'];
                    $arr6 = array($tl,$dr);
                    $total = explode(',',$groupData['group_emp']);
                    $tt = array_unique(array_merge($arr6,$total));
                    $total_emp = count($tt);
                    $groupData['total_emp'] = $total_emp; /** 2 for team leader and driver */
                    
                    $teamleader = Employee::getTeamLeader($tl);
                    $groupData['teamleader'] = $teamleader['employee_name'];
                    $groupData['leaderMobile'] = $teamleader['emp_mobile'];
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
        //prd($data->toArray());

        if(isset($return_arr) && !empty($return_arr)){
            return $return_arr;
        }else{
            return false;
        }
    }

    public static function getAllOrderfilterData($data){
        $date = date("Y-m-d", strtotime($data['date']));
        $myarray = array();
        $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','amcs.type as amc_type','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','job_groups.employee_id','job_groups.employee_role','job_groups.slot_id','job_groups.vehicle_id','groups.group_name')
            ->leftjoin('users','users.id','=','jobs.user_id')
            ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
            ->leftjoin('slots','slots.id','=','jobs.job_slot')
            ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
            ->leftjoin('groups','groups.id','=','job_groups.group_id')
            ->where('jobs.job_date','=',$date)
            //->where('jobs.surveyor_status','=',1)
            ->where('jobs.status','!=',0)
            ->where('jobs.status','!=',1)
            ->where('jobs.status','!=',2)
            ->where('jobs.status','!=',3)
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
            $return_arr[$k]['amc_type'] = $d['amc_type'];
            $return_arr[$k]['mobile'] = $d['mobile'];
            $return_arr[$k]['profile_pic'] = $d['profile_pic'];
            $return_arr[$k]['title'] = $d['title'];
            $return_arr[$k]['slot_name'] = $d['slot_name'];
            $return_arr[$k]['slotstart_time'] = $d['slotstart_time'];
            $return_arr[$k]['slotend_time'] = $d['slotend_time'];
            $return_arr[$k]['group_id'] = $d['group_id'];
            $return_arr[$k]['group_name'] = $d['group_name'];
            

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
            $return_arr[$k]['services'] = $servicedata;
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
            
           // array_push($myarray,$data);
        }
        //prd($data->toArray());

        if(isset($return_arr) && !empty($return_arr)){
            return $return_arr;
        }else{
            return false;
        }
    }

    public static function getAllAppDataDate($date){
        $myarray = array();
        $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','amcs.type as amc_type','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','groups.group_name')
            ->leftjoin('users','users.id','=','jobs.user_id')
            ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
            ->leftjoin('slots','slots.id','=','jobs.job_slot')
            ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
            ->leftjoin('groups','groups.id','=','job_groups.group_id')
            ->where('jobs.job_date','=',$date)
            ->where('jobs.status','!=',0)
            ->where('jobs.status','!=',1)
            ->where('jobs.status','!=',2)
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
            if(isset($d->group_id) && !empty($d->group_id)){
                //prd($d->group_id);
                $groupData = Group::select('groups.*','vehicles.vehicle_no')
                ->join('vehicles','vehicles.id','=','groups.group_vehicle')
                ->where('groups.id','=',$d->group_id)
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
                    $groupData['teamleader_mobile'] = $teamleader['emp_mobile'];
                    $groupData['teamleader_image'] = $teamleader['emp_profile'];
                    $driver = Employee::getDriver($dr);
                    $groupData['drivername'] = $driver['employee_name'];
                    $groupData['driver_image'] = $driver['emp_profile'];
                    
                    $d['group'] = $groupData;
            }else{
                $d['group'] = '';
                $teamleader = Employee::getTeamLeader($d->employee_id);
                $d['empName'] = $teamleader['employee_name'];
                $d['empMobile'] = $teamleader['emp_mobile'];
                $d['empIMG'] = $teamleader['emp_profile'];
                $d['employee_role'] = $teamleader['emp_role'];
                $slots = Slot::select('slots.slot_timename','slots.slotstart_time','slots.slotend_time')
                        ->where('id','=',$d->slot_id)
                        ->first();
                $d['gp_slot'] = $slots['slot_timename'];
                $d['gp_slotstart_time'] = $slots['slotstart_time'];
                $d['gp_slotend_time'] = $slots['slotend_time'];
            }
            array_push($myarray,$data);
        }
        //prd($data->toArray());

        if(isset($data) && !empty($data)){
            return $data;
        }else{
            return false;
        }
    }


    public static function getAllApprovedDate($data){

        $myarray = array();
        $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','amcs.type as amc_type','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','groups.group_name')
            ->leftjoin('users','users.id','=','jobs.user_id')
            ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
            ->leftjoin('slots','slots.id','=','jobs.job_slot')
            ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
            ->leftjoin('groups','groups.id','=','job_groups.group_id')
            ->where('jobs.job_date','=',$data['date'])
            ->where('jobs.status','!=',0)
            ->where('jobs.status','!=',1)
            ->where('jobs.status','!=',2)
            ->groupBy('jobs.id')
            ->get();
            //prd($data->toArray());
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
                $return_arr[$k]['amc_type'] = $d['amc_type'];
                $return_arr[$k]['mobile'] = $d['mobile'];
                $return_arr[$k]['profile_pic'] = $d['profile_pic'];
                $return_arr[$k]['title'] = $d['title'];
                $return_arr[$k]['slot_name'] = $d['slot_name'];
                $return_arr[$k]['slotstart_time'] = $d['slotstart_time'];
                $return_arr[$k]['slotend_time'] = $d['slotend_time'];
                $return_arr[$k]['group_id'] = $d['group_id'];
                $return_arr[$k]['group_name'] = $d['group_name'];
                
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
            $return_arr[$k]['services'] = $servicedata;
            if(isset($d->group_id) && !empty($d->group_id)){
                //prd($d->group_id);
                $groupData = Group::select('groups.*','vehicles.vehicle_no')
                ->join('vehicles','vehicles.id','=','groups.group_vehicle')
                ->where('groups.id','=',$d->group_id)
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
            //array_push($myarray,$data);
        }

        if(isset($return_arr) && !empty($return_arr)){
            return $return_arr;
        }else{
            return false;
        }
    }


    public static function getAllAllotedgroupDate($date){
        $myarray = array();
        $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','amcs.type as amc_type','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','job_groups.employee_id','job_groups.employee_role','job_groups.slot_id','job_groups.vehicle_id','groups.group_name')
            ->leftjoin('users','users.id','=','jobs.user_id')
            ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
            ->leftjoin('slots','slots.id','=','jobs.job_slot')
            ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
            ->leftjoin('groups','groups.id','=','job_groups.group_id')
            //->where('jobs.job_date','=','2018-11-01')
            ->where('jobs.job_date','=',$date)
            //->where('jobs.surveyor_status','=',1)
            ->where('jobs.status','!=',0)
            ->where('jobs.status','1=',1)
            ->where('jobs.status','!=',2)
            ->where('jobs.status','!=',3)
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
                    
                    $d['group'] = $groupData;
            }else{
                $teamleader = Employee::getTeamLeader($d->employee_id);
                $d['empName'] = $teamleader['employee_name'];
                $d['empIMG'] = $teamleader['emp_profile'];
                $slots = Slot::select('slots.slot_timename','slots.slotstart_time','slots.slotend_time')
                        ->where('id','=',$d->slot_id)
                        ->first();
                $d['gp_slot'] = $slots['slot_timename'];
                $d['gp_slotstart_time'] = $slots['slotstart_time'];
                $d['gp_slotend_time'] = $slots['slotend_time'];
            }
            
            array_push($myarray,$data);
        }
        //prd($data->toArray());

        if(isset($data) && !empty($data)){
            return $data;
        }else{
            return false;
        }
    }

    public static function viewallJobsDate($b_nDate = ''){
       // prd($b_nDate);
        $month = date('m');
        $group_id = \Auth::user()->group_id;

        if(isset($group_id) && !empty($group_id)){
            if(isset($b_nDate) && !empty($b_nDate)){
                $mn =date('m', strtotime($b_nDate));
                $data = Jobs::select('jobs.id','jobs.job_date')
                ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
                //->where('jobs.status','=',4)
                ->where('jobs.status','!=',0)
                ->where('jobs.status','!=',1)
                ->where('jobs.status','!=',2)
                ->where('jobs.status','!=',3)
                ->where('job_groups.group_id','=',$group_id)
                ->whereRaw('MONTH(jobs.job_date) = ?',[$mn])
                ->orderBy('jobs.id','asc')
                ->groupBy('jobs.job_date')
                ->get();
            }else{
                $data = Jobs::select('jobs.id','jobs.job_date')
                ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
                ->where('jobs.status','!=',0)
                 ->where('jobs.status','!=',1)
                 ->where('jobs.status','!=',2)
                 ->where('jobs.status','!=',3)
                ->where('job_groups.group_id','=',$group_id)
                ->whereRaw('MONTH(jobs.job_date) = ?',[$month])
                ->orderBy('id','jobs.asc')
                ->groupBy('jobs.job_date')
                ->get();
            }
        }else{
            //print_r($b_nDate);
            if(isset($b_nDate) && !empty($b_nDate)){
                $mn1 =date('m', strtotime($b_nDate));
                $data = Jobs::select('jobs.id','jobs.job_date')
                ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
                ->where('jobs.status','!=',0)
                ->where('jobs.status','!=',1)
                ->where('jobs.status','!=',2)
                //->where('jobs.status','!=',3)
                ->whereRaw('MONTH(jobs.job_date) = ?',[$mn1])
                ->orderBy('jobs.id','asc')
                ->groupBy('jobs.job_date')
                ->get();
               
            }else{
                $data = Jobs::select('jobs.id','jobs.job_date')
                ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
                ->where('jobs.status','!=',0)
                ->where('jobs.status','!=',1)
                ->where('jobs.status','!=',2)
                //->where('jobs.status','!=',3)
                ->whereRaw('MONTH(jobs.job_date) = ?',[$month])
                ->orderBy('jobs.id','asc')
                ->groupBy('jobs.job_date')
                ->get();
            }
        }
        //prd($data);die();
        if($data){
            return json_encode($data);
        }else{
            return 0;
        }
        
    }

    public static function viewallallotedJobsDate($b_nDate = ''){
        $month = date('m');
        $group_id = \Auth::user()->group_id;

        if(isset($group_id) && !empty($group_id)){
            if(isset($b_nDate) && !empty($b_nDate)){
                $mn =date('m', strtotime($b_nDate));
                $data = Jobs::select('jobs.id','jobs.job_date')
                ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
                ->where('jobs.status','!=',0)
                ->where('jobs.status','!=',1)
                ->where('jobs.status','!=',2)
                ->where('jobs.status','!=',3)
                ->where('job_groups.group_id','=',$group_id)
                ->whereRaw('MONTH(jobs.job_date) = ?',[$mn])
                ->orderBy('jobs.id','asc')
                ->groupBy('jobs.job_date')
                ->get();
            }else{
                $data = Jobs::select('jobs.id','jobs.job_date')
                ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
                ->where('jobs.status','!=',0)
                 ->where('jobs.status','!=',1)
                 ->where('jobs.status','!=',2)
                 ->where('jobs.status','!=',3)
                ->where('job_groups.group_id','=',$group_id)
                ->whereRaw('MONTH(jobs.job_date) = ?',[$month])
                ->orderBy('jobs.id','asc')
                ->groupBy('jobs.job_date')
                ->get();
            }
        }else{
             if(isset($b_nDate) && !empty($b_nDate)){
                 $mn1 =date('m', strtotime($b_nDate));
                 $data = Jobs::select('jobs.id','jobs.job_date')
                 ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
                 ->where('jobs.status','!=',0)
                 ->where('jobs.status','!=',1)
                 ->where('jobs.status','!=',2)
                 ->where('jobs.status','!=',3)
                 ->whereRaw('MONTH(jobs.job_date) = ?',[$mn1])
                 ->orderBy('jobs.id','asc')
                 ->groupBy('jobs.job_date')
                 ->get();
                
             }else{
                 $data = Jobs::select('jobs.id','jobs.job_date')
                 ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
                 ->where('jobs.status','!=',0)
                 ->where('jobs.status','!=',1)
                 ->where('jobs.status','!=',2)
                 ->where('jobs.status','!=',3)
                 ->whereRaw('MONTH(jobs.job_date) = ?',[$month])
                 ->orderBy('jobs.id','asc')
                 ->groupBy('jobs.job_date')
                 ->get();
             }
        }
         //prd($data);die();
         if($data){
             return json_encode($data);
         }else{
             return 0;
         }
         
     }

    public static function viewallDate($b_nDate = ''){
        // prd($b_nDate);
         $month = date('m');
         $group_id = \Auth::user()->group_id;
 
         if(isset($group_id) && !empty($group_id)){
             if(isset($b_nDate) && !empty($b_nDate)){
                 $mn =date('m', strtotime($b_nDate));
                 $data = Jobs::select('jobs.id','jobs.job_date')
                 ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
                 ->where('jobs.status','!=',0)
                 ->where('jobs.status','!=',1)
                 ->where('jobs.status','!=',2)
                 ->where('group_id','=',$group_id)
                 ->whereRaw('MONTH(job_date) = ?',[$mn])
                 ->orderBy('id','asc')
                 ->groupBy('job_date')
                 ->get();
             }else{
                 $data = Jobs::select('jobs.id','jobs.job_date')
                 ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
                 ->where('jobs.status','!=',0)
                 ->where('jobs.status','!=',1)
                 ->where('jobs.status','!=',2)
                 ->where('group_id','=',$group_id)
                 ->whereRaw('MONTH(job_date) = ?',[$month])
                 ->orderBy('id','asc')
                 ->groupBy('job_date')
                 ->get();
             }
         }else{
             $data = Jobs::select('jobs.id','jobs.job_date')
             ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
             ->where('jobs.status','!=',0)
             ->where('jobs.status','!=',1)
             ->where('jobs.status','!=',2)
             ->whereRaw('MONTH(job_date) = ?',[$month])
             ->orderBy('id','asc')
             ->groupBy('job_date')
             ->get();
         }
         //prd($data);die();
         if($data){
             return json_encode($data);
         }else{
             return 0;
         }
         
     }

    public static function getAllAllotedcurrent($st){
        $myarray = array();
        $date = date('Y-m-d');
       // $st = [2,3];
       // prd($st);
        $group_id = \Auth::user()->group_id;
        if(isset($group_id) && !empty($group_id)){
            $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','amcs.type as amc_type','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','job_groups.employee_id','job_groups.employee_role','job_groups.slot_id','job_groups.vehicle_id','groups.group_name')
            ->leftjoin('users','users.id','=','jobs.user_id')
            ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
            ->leftjoin('slots','slots.id','=','jobs.job_slot')
            ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
            ->leftjoin('groups','groups.id','=','job_groups.group_id')
            ->where('jobs.job_date','=',$date)
            ->where('job_groups.group_id','=',$group_id)
            //->where('jobs.status','=',$st)
            ->where('jobs.status','!=',0)
            ->where('jobs.status','!=',1)
            ->where('jobs.status','!=',2)
            ->where('jobs.status','!=',3)
            ->groupBy('jobs.id')
            ->get();
        }else{
            $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','amcs.type as amc_type','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','job_groups.employee_id','job_groups.employee_role','job_groups.slot_id','job_groups.vehicle_id','groups.group_name')
            ->leftjoin('users','users.id','=','jobs.user_id')
            ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
            ->leftjoin('slots','slots.id','=','jobs.job_slot')
            ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
            ->leftjoin('groups','groups.id','=','job_groups.group_id')
            ->where('jobs.job_date','=',$date)
            //->where('jobs.status','=',$st)
            ->where('jobs.status','!=',0)
            ->where('jobs.status','!=',1)
            ->where('jobs.status','!=',2)
            ->where('jobs.status','!=',3)
            ->groupBy('jobs.id')
            ->get();
        }
            //prd($data->toArray());
            $empty_arr = array() ;
            $return_arr = array() ;
        foreach($data as $k=>$d){
            $issueProduct = \DB::table('issue_products')->select('issue_products.*')
            ->where('job_id','=',$d->id)
            ->get();

            if(isset($issueProduct[0]) && !empty($issueProduct[0])){
                $d['issueProduct'] = $issueProduct;
            }else{
                $d['issueProduct'] = '';
            }
            
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
            $return_arr[$k]['amc_type'] = $d['amc_type'];
            $return_arr[$k]['mobile'] = $d['mobile'];
            $return_arr[$k]['profile_pic'] = $d['profile_pic'];
            $return_arr[$k]['title'] = $d['title'];
            $return_arr[$k]['slot_name'] = $d['slot_name'];
            $return_arr[$k]['slotstart_time'] = $d['slotstart_time'];
            $return_arr[$k]['slotend_time'] = $d['slotend_time'];
            $return_arr[$k]['group_id'] = $d['group_id'];
            $return_arr[$k]['group_name'] = $d['group_name'];
            $return_arr[$k]['issueProduct'] = $d['issueProduct'];
            
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
            $return_arr[$k]['services'] = $servicedata;
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
                    // $groupser = explode(',',$groupData['group_service']);
                    // $ser = Service::select(\DB::raw("(GROUP_CONCAT(DISTINCT service_name SEPARATOR ',')) as 'ser_name' "))->whereIn('id',$groupser)->first();
                    // // concat gruop 
                    // $groupData['services'] = $ser->ser_name;
                    $teamleader = Employee::getTeamLeader($tl);
                    $groupData['teamleader'] = $teamleader['employee_name'];
                    $groupData['teamleader_mob'] = $teamleader['emp_mobile'];
                    $groupData['teamleader_image'] = $teamleader['emp_profile'];
                    $driver = Employee::getDriver($dr);
                    $groupData['drivername'] = $driver['employee_name'];
                    $groupData['driver_image'] = $driver['emp_profile'];
                    
                    $return_arr[$k]['group'] = $groupData;
            }else{
                $return_arr[$k]['group'] = '';
                $teamleader = Employee::getTeamLeader($d->employee_id);
                $return_arr[$k]['empName'] = $teamleader['employee_name'];
                $return_arr[$k]['empMobile'] = $teamleader['emp_mobile'];
                $return_arr[$k]['empIMG'] = $teamleader['emp_profile'];
                $return_arr[$k]['employee_role'] = $teamleader['emp_role'];
                $slots = Slot::select('slots.slot_timename','slots.slotstart_time','slots.slotend_time')
                        ->where('id','=',$d->slot_id)
                        ->first();
                $return_arr[$k]['gp_slot'] = $slots['slot_timename'];
                $return_arr[$k]['gp_slotstart_time'] = $slots['slotstart_time'];
                $return_arr[$k]['gp_slotend_time'] = $slots['slotend_time'];
            }
            
           // array_push($myarray,$data);
        }
        //prd($return_arr);

        if(isset($return_arr) && !empty($return_arr)){
            return $return_arr;
        }else{
            return $return_arr;
        }
    }

    public static function getAllNegotiatebyDate($data){
        $myarray = array();
        $date = $data['date'];
        
        if(isset($data['group_id']) && !empty($data['group_id'])){
           
            $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','amcs.type as amc_type','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','job_groups.employee_id','job_groups.employee_role','job_groups.slot_id','job_groups.vehicle_id','groups.group_name')
            ->leftjoin('users','users.id','=','jobs.user_id')
            ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
            ->leftjoin('slots','slots.id','=','jobs.job_slot')
            ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
            ->leftjoin('groups','groups.id','=','job_groups.group_id')
            ->where('jobs.job_date','=',$date)
            ->where('jobs.status','!=',0)
            ->where('jobs.status','!=',1)
            ->where('jobs.status','!=',2)
            ->where('job_groups.group_id','=',$data['group_id'])
            ->groupBy('jobs.id')
            ->get();
        }else{
            $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','amcs.type as amc_type','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','job_groups.employee_id','job_groups.employee_role','job_groups.slot_id','job_groups.vehicle_id','groups.group_name')
            ->leftjoin('users','users.id','=','jobs.user_id')
            ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
            ->leftjoin('slots','slots.id','=','jobs.job_slot')
            ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
            ->leftjoin('groups','groups.id','=','job_groups.group_id')
            ->where('jobs.job_date','=',$date)
            ->where('jobs.status','!=',0)
            ->where('jobs.status','!=',1)
            ->where('jobs.status','!=',2)
            ->groupBy('jobs.id')
            ->get();
        }
            //prd($data->toArray());
            $empty_arr = array() ;
            $return_arr = array() ;
        foreach($data as $k=>$d){
            $issueProduct = \DB::table('issue_products')->select('issue_products.*')
            ->where('job_id','=',$d->id)
            ->get();

            if(isset($issueProduct[0]) && !empty($issueProduct[0])){
                $d['issueProduct'] = $issueProduct;
            }else{
                $d['issueProduct'] = '';
            }
            
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
            $return_arr[$k]['amc_type'] = $d['amc_type'];
            $return_arr[$k]['mobile'] = $d['mobile'];
            $return_arr[$k]['profile_pic'] = $d['profile_pic'];
            $return_arr[$k]['title'] = $d['title'];
            $return_arr[$k]['slot_name'] = $d['slot_name'];
            $return_arr[$k]['slotstart_time'] = $d['slotstart_time'];
            $return_arr[$k]['slotend_time'] = $d['slotend_time'];
            $return_arr[$k]['group_id'] = $d['group_id'];
            $return_arr[$k]['group_name'] = $d['group_name'];
            $return_arr[$k]['issueProduct'] = $d['issueProduct'];
            

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
            $return_arr[$k]['services'] = $servicedata;
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
                    $groupData['teamleader_mob'] = $teamleader['emp_mobile'];
                    $groupData['teamleader_image'] = $teamleader['emp_profile'];
                    $driver = Employee::getDriver($dr);
                    $groupData['drivername'] = $driver['employee_name'];
                    $groupData['driver_image'] = $driver['emp_profile'];
                    
                    $return_arr[$k]['group'] = $groupData;
            }else{
                $return_arr[$k]['group'] = '';
                $teamleader = Employee::getTeamLeader($d->employee_id);
                $return_arr[$k]['empName'] = $teamleader['employee_name'];
                $return_arr[$k]['empMobile'] = $teamleader['emp_mobile'];
                $return_arr[$k]['empIMG'] = $teamleader['emp_profile'];
                $return_arr[$k]['employee_role'] = $teamleader['emp_role'];
                $slots = Slot::select('slots.slot_timename','slots.slotstart_time','slots.slotend_time')
                        ->where('id','=',$d->slot_id)
                        ->first();
                $return_arr[$k]['gp_slot'] = $slots['slot_timename'];
                $return_arr[$k]['gp_slotstart_time'] = $slots['slotstart_time'];
                $return_arr[$k]['gp_slotend_time'] = $slots['slotend_time'];
            }
            
           // array_push($myarray,$data);
        }
        //prd($return_arr);

        if(isset($return_arr) && !empty($return_arr)){
            return $return_arr;
        }else{
            return $return_arr;
        }
    }

    public static function getAllAllotedbyDate($data){
        $myarray = array();
        $date = $data['date'];
        
        if(isset($data['group_id']) && !empty($data['group_id'])){
           
            $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','amcs.type as amc_type','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','job_groups.employee_id','job_groups.employee_role','job_groups.slot_id','job_groups.vehicle_id','groups.group_name')
            ->leftjoin('users','users.id','=','jobs.user_id')
            ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
            ->leftjoin('slots','slots.id','=','jobs.job_slot')
            ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
            ->leftjoin('groups','groups.id','=','job_groups.group_id')
            ->where('jobs.job_date','=',$date)
            //->where('jobs.surveyor_status','=',1)
            ->where('jobs.status','!=',0)
            ->where('jobs.status','!=',1)
            ->where('jobs.status','!=',2)
            ->where('jobs.status','!=',3)
            ->where('job_groups.group_id','=',$data['group_id'])
            ->groupBy('jobs.id')
            ->get();
        }else{
            $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','amcs.type as amc_type','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','job_groups.employee_id','job_groups.employee_role','job_groups.slot_id','job_groups.vehicle_id','groups.group_name')
            ->leftjoin('users','users.id','=','jobs.user_id')
            ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
            ->leftjoin('slots','slots.id','=','jobs.job_slot')
            ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
            ->leftjoin('groups','groups.id','=','job_groups.group_id')
            ->where('jobs.job_date','=',$date)
            //->where('jobs.surveyor_status','=',1)
            ->where('jobs.status','!=',0)
            ->where('jobs.status','!=',1)
            ->where('jobs.status','!=',2)
            ->where('jobs.status','!=',3)
            ->groupBy('jobs.id')
            ->get();
        }
            //prd($data->toArray());
            $empty_arr = array() ;
            $return_arr = array() ;
        foreach($data as $k=>$d){
            $issueProduct = \DB::table('issue_products')->select('issue_products.*')
            ->where('job_id','=',$d->id)
            ->get();

            if(isset($issueProduct[0]) && !empty($issueProduct[0])){
                $d['issueProduct'] = $issueProduct;
            }else{
                $d['issueProduct'] = '';
            }
           
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
            $return_arr[$k]['amc_type'] = $d['amc_type'];
            $return_arr[$k]['mobile'] = $d['mobile'];
            $return_arr[$k]['profile_pic'] = $d['profile_pic'];
            $return_arr[$k]['title'] = $d['title'];
            $return_arr[$k]['slot_name'] = $d['slot_name'];
            $return_arr[$k]['slotstart_time'] = $d['slotstart_time'];
            $return_arr[$k]['slotend_time'] = $d['slotend_time'];
            $return_arr[$k]['group_id'] = $d['group_id'];
            $return_arr[$k]['group_name'] = $d['group_name'];
            $return_arr[$k]['issueProduct'] = $d['issueProduct'];
           

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
            $return_arr[$k]['services'] = $servicedata;
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
                    // $groupser = explode(',',$groupData['group_service']);
                    // $ser = Service::select(\DB::raw("(GROUP_CONCAT(DISTINCT service_name SEPARATOR ',')) as 'ser_name' "))->whereIn('id',$groupser)->first();
                    // // concat gruop 
                    // $groupData['services'] = $ser->ser_name;
                    
                    $teamleader = Employee::getTeamLeader($tl);
                    $groupData['teamleader'] = $teamleader['employee_name'];
                    $groupData['teamleader_mob'] = $teamleader['emp_mobile'];
                    $groupData['teamleader_image'] = $teamleader['emp_profile'];
                    $driver = Employee::getDriver($dr);
                    $groupData['drivername'] = $driver['employee_name'];
                    $groupData['driver_image'] = $driver['emp_profile'];
                    
                    $return_arr[$k]['group'] = $groupData;
            }else{
                $return_arr[$k]['group'] = '';
                $teamleader = Employee::getTeamLeader($d->employee_id);
                $return_arr[$k]['empName'] = $teamleader['employee_name'];
                $return_arr[$k]['empMobile'] = $teamleader['emp_mobile'];
                $return_arr[$k]['empIMG'] = $teamleader['emp_profile'];
                $return_arr[$k]['employee_role'] = $teamleader['emp_role'];
                $slots = Slot::select('slots.slot_timename','slots.slotstart_time','slots.slotend_time')
                        ->where('id','=',$d->slot_id)
                        ->first();
                $return_arr[$k]['gp_slot'] = $slots['slot_timename'];
                $return_arr[$k]['gp_slotstart_time'] = $slots['slotstart_time'];
                $return_arr[$k]['gp_slotend_time'] = $slots['slotend_time'];
            }
            
           // array_push($myarray,$data);
        }
        //prd($return_arr);

        if(isset($return_arr) && !empty($return_arr)){
            return $return_arr;
        }else{
            return $return_arr;
        }
    }
    

    public static function getnotAssignProduct($id){
        $myarray = array();
        $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','job_groups.employee_id','job_groups.employee_role','job_groups.slot_id','job_groups.vehicle_id','groups.group_name')
            ->leftjoin('users','users.id','=','jobs.user_id')
            ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
            ->leftjoin('slots','slots.id','=','jobs.job_slot')
            ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
            ->leftjoin('groups','groups.id','=','job_groups.group_id')
            ->where('jobs.id','=',$id)
            //->where('jobs.status','=',3)
            ->groupBy('jobs.id')
            ->first();

            $data['requestedInventory'] = \DB::table('issue_products')
                            ->select('issue_products.*','products.product_name','products.product_img','brands.brand_name')
                            ->leftjoin('products','products.id','=','issue_products.product_id')
                            ->leftjoin('brands','brands.id','=','issue_products.brand_id')
                            ->where('issue_products.job_id','=',$id)
                            ->get();
            $data['issueProduct'] = \DB::table('issue_products')->select('issue_products.*')
                            ->where('job_id','=',$data->id)
                            ->get();
            $data['surveyerdetail'] = Survey::Select('surveys.*','employees.emp_profile','employees.employee_name','employees.emp_mobile','slots.slot_timename','slots.slotstart_time','slots.slotend_time')
                            ->leftjoin('employees','employees.id','=','surveys.surveyor_emp_id')
                            ->leftjoin('slots','slots.id','=','surveys.survey_slot_id')
                            ->where('surveys.job_id','=',$data->id)
                            ->first();

            $service_id = explode(',',$data->service_id);
            
            $servicedata = Service::Select('id','service_name','service_code','instant_service_price','surveyer_price','service_icon')
                            ->whereIn('id',$service_id)
                            ->get();
            foreach($servicedata as $sd){
                $jobServices = JobService::select('specify_problem','additional_notes','service_image')
                            ->where('job_id','=',$data->id)
                            ->where('service_id','=',$sd->id)
                            ->first();

                            $sd['jobServices'] = $jobServices;
            }
              
            $data['services'] = $servicedata;
            if(isset($data->group_id) && !empty($data->group_id)){
                $groupData = Group::select('groups.*','vehicles.vehicle_no')
                ->join('vehicles','vehicles.id','=','groups.group_vehicle')
                ->where('groups.id','=',$data->group_id)
                ->first();
                    $tl = $groupData['team_leader'];
                    $dr = $groupData['driver'];
                    $total = explode(',',$groupData['group_emp']);
                    $total_emp = count($total);
                    $groupData['total_emp'] = $total_emp + 2; /** 2 for team leader and driver */
                    $arr = array();
                    foreach($total as $t){
                    $team_member = \DB::table('employees')->select('employees.employee_name','employees.emp_profile','employees.emp_role','employees.emp_mobile')
                                        ->where('employees.id','=',$t)                    
                                        ->first();
                    if(isset($team_member) && !empty($team_member)){
                        $team_member->emp_id =$t; 
                        array_push($arr,$team_member);
                    }  
                        
                    }

                    $data['team_member'] = $arr;
                    $groupser = explode(',',$groupData['group_service']);
                    $ser = Service::select(\DB::raw("(GROUP_CONCAT(DISTINCT service_name SEPARATOR ',')) as 'ser_name' "))->whereIn('id',$groupser)->first();
                    // concat gruop 
                    $groupData['services'] = $ser->ser_name;
                    $teamleader = Employee::getTeamLeader($tl);
                    $groupData['teamleader'] = $teamleader['employee_name'];
                    $groupData['teamleader_mob'] = $teamleader['emp_mobile'];
                    $groupData['teamleader_image'] = $teamleader['emp_profile'];
                    $driver = Employee::getDriver($dr);
                    $groupData['drivername'] = $driver['employee_name'];
                    $groupData['driver_image'] = $driver['emp_profile'];
                    
                    $data['group'] = $groupData;


                    

            }else{
                $data['group'] = '';
                $teamleader = Employee::getTeamLeader($data->employee_id);
                $data['empName'] = $teamleader['employee_name'];
                $data['empMobile'] = $teamleader['emp_mobile'];
                $data['empIMG'] = $teamleader['emp_profile'];
                $data['employee_role'] = $teamleader['emp_role'];
                $slots = Slot::select('slots.slot_timename','slots.slotstart_time','slots.slotend_time')
                        ->where('id','=',$data->slot_id)
                        ->first();
                $data['gp_slot'] = $slots['slot_timename'];
                $data['gp_slotstart_time'] = $slots['slotstart_time'];
                $data['gp_slotend_time'] = $slots['slotend_time'];
            }
            //prd($data->toArray());
        if(isset($data) && !empty($data)){
            return $data;
        }else{
            return false;
        }
    }

    public static function getAllAllotedgroupType($data){

        $service_type= $data['service_type'];
        $group_type = $data['group_type'];
        $employee_id = $data['employee_id'];
        $vehicle_no = $data['vehicle_id'];
        $myarray = array();
        if($service_type == '' && $employee_id == '' && $vehicle_no == ''){
            if($group_type == 'All'){
                $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','amcs.type as amc_type','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','job_groups.employee_id','job_groups.type','job_groups.employee_role','job_groups.slot_id','job_groups.vehicle_id','groups.group_name')
                ->leftjoin('users','users.id','=','jobs.user_id')
                ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
                ->leftjoin('slots','slots.id','=','jobs.job_slot')
                ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
                ->leftjoin('groups','groups.id','=','job_groups.group_id')
                //->where('jobs.surveyor_status','=',1)
                ->where('jobs.status','!=',0)
                ->where('jobs.status','!=',1)
                ->where('jobs.status','!=',2)
                ->where('jobs.status','!=',3)
                ->groupBy('jobs.id')
                ->get();
            }else{
                $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','amcs.type as amc_type','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','job_groups.employee_id','job_groups.type','job_groups.employee_role','job_groups.slot_id','job_groups.vehicle_id','groups.group_name')
                ->leftjoin('users','users.id','=','jobs.user_id')
                ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
                ->leftjoin('slots','slots.id','=','jobs.job_slot')
                ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
                ->leftjoin('groups','groups.id','=','job_groups.group_id')
                //->where('jobs.surveyor_status','=',1)
                ->where('jobs.status','!=',0)
                ->where('jobs.status','!=',1)
                ->where('jobs.status','!=',2)
                ->where('jobs.status','!=',3)
                ->where('job_groups.type',$group_type)
                ->groupBy('jobs.id')
                ->get();
            }
        }else if($employee_id == '' && $service_type == '' && $group_type == ''){
            
            $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','amcs.type as amc_type','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','job_groups.employee_id','job_groups.type','job_groups.employee_role','job_groups.slot_id','job_groups.vehicle_id','job_groups.employee_id','groups.group_name','groups.team_leader')
            ->leftjoin('users','users.id','=','jobs.user_id')
            ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
            ->leftjoin('slots','slots.id','=','jobs.job_slot')
            ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
            ->leftjoin('groups','groups.id','=','job_groups.group_id')
            //->where('jobs.surveyor_status','=',1)
            ->where('job_groups.vehicle_id',$vehicle_no)
            ->orWhere('groups.group_vehicle',$vehicle_no)
            ->where('jobs.status','!=',0)
            ->where('jobs.status','!=',1)
            ->where('jobs.status','!=',2)
            ->where('jobs.status','!=',3)
            ->groupBy('jobs.id')
            ->get();
            
        }else if($vehicle_no == '' && $service_type == '' && $group_type == ''){
            $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','amcs.type as amc_type','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','job_groups.employee_id','job_groups.type','job_groups.employee_role','job_groups.slot_id','job_groups.vehicle_id','job_groups.employee_id','groups.group_name','groups.team_leader')
            ->leftjoin('users','users.id','=','jobs.user_id')
            ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
            ->leftjoin('slots','slots.id','=','jobs.job_slot')
            ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
            ->leftjoin('groups','groups.id','=','job_groups.group_id')
            //->where('jobs.surveyor_status','=',1)
            ->where('jobs.status','!=',0)
            ->where('jobs.status','!=',1)
            ->where('jobs.status','!=',2)
            ->where('jobs.status','!=',3)
            ->where('job_groups.employee_id',$employee_id)
            ->orWhere('groups.team_leader',$employee_id)
            ->groupBy('jobs.id')
            ->get();
        }else{
            if($service_type == 'All'){
                $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','amcs.type as amc_type','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','job_groups.employee_id','job_groups.type','job_groups.employee_role','job_groups.slot_id','job_groups.vehicle_id','groups.group_name')
                ->leftjoin('users','users.id','=','jobs.user_id')
                ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
                ->leftjoin('slots','slots.id','=','jobs.job_slot')
                ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
                ->leftjoin('groups','groups.id','=','job_groups.group_id')
                //->where('jobs.surveyor_status','=',1)
                ->where('jobs.status','!=',0)
                ->where('jobs.status','!=',1)
                ->where('jobs.status','!=',2)
                ->where('jobs.status','!=',3)
                ->groupBy('jobs.id')
                ->get();
            }else{
                $data = Jobs::select('jobs.*','users.firstname','users.lastname','users.mobile','users.profile_pic','amcs.title','amcs.address','amcs.type as amc_type','slots.slot_timename as slot_name','slots.slotstart_time','slots.slotend_time','job_groups.group_id','job_groups.employee_id','job_groups.type','job_groups.employee_role','job_groups.slot_id','job_groups.vehicle_id','groups.group_name')
                ->leftjoin('users','users.id','=','jobs.user_id')
                ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
                ->leftjoin('slots','slots.id','=','jobs.job_slot')
                ->leftjoin('job_groups','job_groups.job_id','=','jobs.id')
                ->leftjoin('groups','groups.id','=','job_groups.group_id')
                //->where('jobs.surveyor_status','=',1)
                ->where('jobs.status','!=',0)
                ->where('jobs.status','!=',1)
                ->where('jobs.status','!=',2)
                ->where('jobs.status','!=',3)
                ->where('jobs.service_type',$service_type)
                ->groupBy('jobs.id')
                ->get();
            }
        }
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
                $return_arr[$k]['amc_type'] = $d['amc_type'];
                $return_arr[$k]['mobile'] = $d['mobile'];
                $return_arr[$k]['profile_pic'] = $d['profile_pic'];
                $return_arr[$k]['title'] = $d['title'];
                $return_arr[$k]['slot_name'] = $d['slot_name'];
                $return_arr[$k]['slotstart_time'] = $d['slotstart_time'];
                $return_arr[$k]['slotend_time'] = $d['slotend_time'];
                $return_arr[$k]['group_id'] = $d['group_id'];
                $return_arr[$k]['group_name'] = $d['group_name'];
               


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
            $return_arr[$k]['services'] = $servicedata;
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
            
           // array_push($myarray,$data);
        }
        //prd($data->toArray());

        if(isset($return_arr) && !empty($return_arr)){
            return $return_arr;
        }else{
            return false;
        }
    }

    
    
}
