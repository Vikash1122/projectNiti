<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class EmpService extends Model
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

    static function updateData($service, $id){
        //$data = EmpService::where('employee_id','=',$id)->get();
        $deletedata = EmpService::where('employee_id','=',$id)->delete();
       // print_r($deletedata);die();
        if($deletedata){
            foreach($service as $ser)
            {
                $val = explode('_',$ser);
                $serid = $val[0];
                $name= $val[1];
                $serviceupdata = array(
                    'employee_id' =>$id,
                    'service_id' => $serid,
                    'service_name' => $name
                );
                
               
            }
            $tbupdatedata = EmpService::insert($serviceupdata);
             print_r($tbupdatedata);die();
            if($tbupdatedata){
                return $tbupdatedata;
            }else{
                return false;
            }
        }
    }
}
