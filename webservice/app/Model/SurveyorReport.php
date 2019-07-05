<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Job;
use App\Model\ReportComment;

class SurveyorReport extends Model
{
    protected $table = 'surveyor_reports';
    public $timestamps = false;



    public static function viewJObs($user_id){
        $user = Job::select('id as job_id')->where('user_id','=',$user_id)->get();
    
        $data = array();
        foreach($user as $uid){
            $dta = static::select('job_id')->where('job_id','=',$uid->job_id)->groupBy('job_id')->first();
            if(isset($dta) && !empty($dta)){
                array_push($data,$dta);
            }
           
        }
       // print_r($data);die();
        //$data = static::select('job_id')->where('user_id','=',$user_id)->groupBy('job_id')->get();
        $myarray = array();
        foreach($data as $d){
            $jobs = Job::select('jobs.*','amcs.title','amcs.address')
                    ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
                    ->where('jobs.id','=',$d->job_id)
                    ->first();
        array_push($myarray,$jobs);
        }
        foreach($myarray as $arr){
            $arr['reportservice'] = static::select('surveyor_reports.service_id','surveyor_reports.data','services.service_name')
                ->leftjoin('services','services.id','=','surveyor_reports.service_id')
                ->where('job_id','=',$arr->id)
                //->where('user_id','=',$user_id)
                ->groupBy('surveyor_reports.service_id')
                ->get();
        }
        //print_r($myarray);die();
        if(isset($myarray) && !empty($myarray)){

            $empty_arr = array() ;
            $return_arr = array() ;
            foreach($myarray as $k=>$data1){
                //address tak milega
                $return_arr[$k]['id'] = $data1['id'] ;
                $return_arr[$k]['user_id'] = $data1['user_id'] ;
                $return_arr[$k]['amc_id'] = $data1['amc_id'] ;
                $return_arr[$k]['service_id'] = $data1['service_id'] ;
                $return_arr[$k]['job_date'] = $data1['job_date'] ;
                $return_arr[$k]['job_slot'] = $data1['job_slot'] ;
                $return_arr[$k]['status'] = $data1['status'] ;
                $return_arr[$k]['surveyor_status'] = $data1['surveyor_status'];
                $return_arr[$k]['created_at'] = $data1['created_at'];
                $return_arr[$k]['updated_at'] = $data1['updated_at'];
                $return_arr[$k]['title'] = $data1['title'];
                $return_arr[$k]['address'] = $data1['address'];
                foreach($data1['reportservice'] as $t=>$data){
                    //service_id milega 
                    $return_arr[$k]['reportservicedata'][$t]['service_id'] = $data['service_id'];
                    $return_arr[$k]['reportservicedata'][$t]['service_name'] = $data['service_name'];
                    $return_arr[$k]['reportservicedata'][$t]['comments'] = json_decode($data['data']);

                    $return_arr[$k]['reportservicedata'][$t]['total_servicePrice'] = array_sum(array_column($return_arr[$k]['reportservicedata'][$t]['comments'],'estimate_price'));
                    
                    //$return_arr[$k]['total_price'] = array_sum(array_column($return_arr[$k]['reportservicedata'],'total_servicePrice'));

                    $return_arr[$k]['reportservicedata'][$t]['total_estimateTime'] = array_sum(array_column($return_arr[$k]['reportservicedata'][$t]['comments'],'estimate_time'));
                    //$return_arr[$k]['total_time'] = array_sum(array_column($return_arr[$k]['reportservicedata'],'total_estimateTime'));
                    //print_r($return_arr[$k]['reportservicedata'][$t]);
                }
               
            }
           // die();
            return $return_arr;
        }else{
            return false;
        }

    }


    public static function viewJobComment($input,$device_type){
        // $myarray = Job::select('jobs.*','amcs.title','amcs.address')
        //             ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
        //             ->where('jobs.id','=',$input['job_id'])
        //             ->first();
        $reportservice = static::select('surveyor_reports.service_id','surveyor_reports.data','services.service_name')
            ->leftjoin('services','services.id','=','surveyor_reports.service_id')
            //->where('user_id','=',$input['user_id'])
            ->where('job_id','=',$input['job_id'])
            ->groupBy('surveyor_reports.service_id')
            ->get();
           
        
        if(isset($reportservice) && !empty($reportservice)){

            $return_arr = array() ;
            
                foreach($reportservice as $t=>$data){
                    //service_id milega 
                    $return_arr[$t]['service_id'] = $data['service_id'];
                    $return_arr[$t]['service_name'] = $data['service_name'];
                    $return_arr[$t]['comments'] = json_decode($data['data']);

                }
                
            return $return_arr;
        }else{
            return false;
        }

    }
}
