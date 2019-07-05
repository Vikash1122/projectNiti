<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Service;
use App\Employee;

class Group extends Model
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
    
    public static function InsertGroup($data) {
        //$date = date('Y-m-d', strtotime($data['group_date']));
       // prd($data);
        $insert = new Group();
        $insert->group_name = (isset($data['group_name'])) ? $data['group_name'] : '';
        //$insert->group_date = (isset($date)) ? $date : NULL;
        $insert->group_service = (isset($data['ser'])) ? $data['ser'] : NULL;
        $insert->team_leader = (isset($data['team_leader'])) ? $data['team_leader']: NULL;
        $insert->driver = (isset($data['driver'])) ? $data['driver']: NULL;
        $insert->group_vehicle = (isset($data['group_vehicle'])) ? $data['group_vehicle']: NULL;
        $insert->group_emp = (isset($data['emp_id'])) ? $data['emp_id']: NULL;
        //$insert->status = 1;
        $save = $insert->save();
        if ($save) {
            $insert_id = $insert->id;
            return $insert_id;
        }else{
            return false;
        }
    }

    public static function updateGroup($data, $id) {
        
        //$date = date('Y-m-d', strtotime($data['group_date']));
       // prd($data);
        $update = static::where('id', $id)->first();

        $update->group_name = (isset($data['group_name'])) ? $data['group_name']: NULL;
        //$update->group_date = (isset($date)) ? $date : '';
        $update->group_service = (isset($data['ser'])) ? $data['ser'] : NULL;
        $update->team_leader = (isset($data['team_leader'])) ? $data['team_leader'] : NULL;
        $update->driver = (isset($data['driver'])) ? $data['driver'] : NULL;
        $update->group_vehicle = (isset($data['group_vehicle'])) ? $data['group_vehicle'] : null;
        $update->group_emp = (isset($data['emp_id'])) ? $data['emp_id'] : NULL;
        $save = $update->save();
        if ($save) {
            return $update;
        }else{
            return false;
        }
    }

    public static function updateService($data, $id, $picture) {
        
        $update = static::where('id', $id)->first();
        $update->service_name = (isset($data['service_name'])) ? $data['service_name'] : NULL;
        $update->service_code = (isset($data['service_code'])) ? $data['service_code'] : NULL;
        $update->instant_service_price = (isset($data['instant_service_price'])) ? $data['instant_service_price'] : NULL;
        $update->service_icon = (isset($picture)) ? $picture: NULL;
        $save = $update->save();
        if ($save) {
            return $update;
        }else{
            return false;
        }
    }


    public static function getGroupdata($id){
        $myarray = array();
        $data = static::select('groups.*','vehicles.vehicle_no')
                ->join('vehicles','vehicles.id','=','groups.group_vehicle')
                ->where('groups.id','=',$id)
                ->first();
               
            $groupser = explode(',',$data->group_service);
            $ser = Service::select(\DB::raw("(GROUP_CONCAT(DISTINCT service_name SEPARATOR ',')) as 'ser_name' "))->whereIn('id',$groupser)->first();
            // concat gruop 
            $data['services'] = $ser->ser_name;
            $teamleader = Employee::getTeamLeader($data->team_leader);
            $data['teamleader'] = $teamleader['employee_name'];
            $data['teamleader_image'] = $teamleader['emp_profile'];
            $driver = Employee::getDriver($data->driver);
            $data['driver'] = $driver['employee_name'];
            $data['driver_image'] = $driver['emp_profile'];

            $data['employee'] = Employee::getEmployee($data->group_emp);
            array_push($myarray,$data);
            //print_r($myarray);
       // }    //die();    
        
       //prd($myarray);
        if(isset($myarray) && !empty($myarray)){
            return $myarray;
        }else{
            return false;
        }
    }

    public static function getGroupdataaccDate(){
        $myarray = array();
        $data = static::select('groups.*','vehicles.vehicle_no')
                ->join('vehicles','vehicles.id','=','groups.group_vehicle')
                //->where('groups.group_date','=',$date)
                //->where('groups.group_date','=','2018-11-01')
                ->get();
               
        foreach($data as $dt){
            $total = explode(',',$dt->group_emp);
            $total_emp = count($total);
            $dt['total_emp'] = $total_emp + 2;

            $groupser = explode(',',$dt->group_service);
            $ser = Service::select(\DB::raw("(GROUP_CONCAT(DISTINCT service_name SEPARATOR ',')) as 'ser_name' "))->whereIn('id',$groupser)->first();
            // concat gruop 
            $dt['services'] = $ser->ser_name;

            $groupEmp = explode(',',$dt->group_emp);
            $employ = Employee::select(\DB::raw("(GROUP_CONCAT(DISTINCT employee_name SEPARATOR ',')) as 'emp_name' "))->whereIn('id',$groupEmp)->first();
            // concat gruop 
            $dt['employee'] = $employ->emp_name;

            $teamleader = Employee::getTeamLeader($dt->team_leader);
            $dt['teamleader'] = $teamleader['employee_name'];
            $dt['teamleader_image'] = $teamleader['emp_profile'];
            $driver = Employee::getDriver($dt->driver);
            $dt['driver'] = $driver['employee_name'];
            $dt['driver_image'] = $driver['emp_profile'];
            array_push($myarray,$dt);
            //print_r($myarray);
        }    //die();    
        

        if(isset($myarray) && !empty($myarray)){
            return $myarray;
        }else{
            $myarray = [];
            return $myarray;
        }
    }

    public static function getGroupdataaccDate1($keyword){
        $myarray = array();

        $data = static::select('groups.*','vehicles.vehicle_no')
                ->join('vehicles','vehicles.id','=','groups.group_vehicle')
                ->where('group_name', 'LIKE', "%$keyword%")
                ->get();
              // print_r($data);die;
        foreach($data as $dt){
            $total = explode(',',$dt->group_emp);
            $total_emp = count($total);
            $dt['total_emp'] = $total_emp + 2;

            $groupser = explode(',',$dt->group_service);
            $ser = Service::select(\DB::raw("(GROUP_CONCAT(DISTINCT service_name SEPARATOR ',')) as 'ser_name' "))->whereIn('id',$groupser)->first();
            // concat gruop 
            $dt['services'] = $ser->ser_name;

            $groupEmp = explode(',',$dt->group_emp);
            $employ = Employee::select(\DB::raw("(GROUP_CONCAT(DISTINCT employee_name SEPARATOR ',')) as 'emp_name' "))->whereIn('id',$groupEmp)->first();
            // concat gruop 
            $dt['employee'] = $employ->emp_name;


            $teamleader = Employee::getTeamLeader($dt->team_leader);
            $dt['teamleader'] = $teamleader['employee_name'];
            $dt['teamleader_image'] = $teamleader['emp_profile'];
            $driver = Employee::getDriver($dt->driver);
            $dt['driver'] = $driver['employee_name'];
            $dt['driver_image'] = $driver['emp_profile'];
            array_push($myarray,$dt);
            //print_r($myarray);
        }    //die();    
        

        if(isset($myarray) && !empty($myarray)){
            return $myarray;
        }else{
            $myarray = [];
            return $myarray;
        }
    }

    public static function getGroup($group_id){
        $myarray = array();
        //prd($group_id);
        $data = static::select('groups.*','vehicles.vehicle_no')
                ->join('vehicles','vehicles.id','=','groups.group_vehicle')
                ->where('groups.id','=',$group_id)
                ->first();
            $total = explode(',',$data->group_emp);
            $total_emp = count($total);
            $data['total_emp'] = $total_emp + 2;
                //prd($data);
            $groupser = explode(',',$data['group_service']);
            $ser = Service::select(\DB::raw("(GROUP_CONCAT(DISTINCT service_name SEPARATOR ',')) as 'ser_name' "))->whereIn('id',$groupser)->first();
            // concat gruop 
            $data['services'] = $ser->ser_name;
            $teamleader = Employee::getTeamLeader($data['team_leader']);
            $data['teamleader'] = $teamleader['employee_name'];
            $data['teamleader_image'] = $teamleader['emp_profile'];
            $driver = Employee::getDriver($data['driver']);
            $data['drivername'] = $driver['employee_name'];
            $data['driver_image'] = $driver['emp_profile'];
            array_push($myarray,$data);
            
        if(isset($myarray) && !empty($myarray)){
            return $myarray;
        }else{
            return false;
        }
    }
    
}
