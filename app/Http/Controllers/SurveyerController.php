<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Survey;
use App\Employee;
use App\Jobs;
use App\Service;
use Auth;
use DB;

class SurveyerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $date = date('Y-m-d');
        $surveyors = Survey::getSurveyorDataDate($date);
        return view('admin.surveyer.scheduleSurvey',compact('surveyors'));
    }

    public function getAllSurveyorAjax(Request $request){
        $data = $request->all();

        $surveyors = Survey::getSurveyorDataDate($data['date']);
       
        if(isset($surveyors) && !empty($surveyors)){
           return json_encode($surveyors);
            
        }else{
            echo '0';
        }
    }


    public function getAllSurveys(){

        $jobs = Jobs::getAllJobs();
        return view('admin.surveyer.allSurvey',compact('jobs'));
    }

    public function getAllProposedAjax(Request $request){
        $data = $request->all();
        $jobs = Jobs::getAllJobsStatus($data['status_id']);
       
        if(isset($jobs) && !empty($jobs)){
           return json_encode($jobs);
            
        }else{
            echo '0';
        }
    }

    public function show(){
        
        return view('admin.surveyer.surveyDetail');
    }

    public function edit($id){
        $myarray= array();
        $job_services = Jobs::select('service_id')
        ->where('id','=',$id)
        ->first();
        $st = explode(',',$job_services->service_id);
        foreach($st as $s){
            $services = Service::select('id','service_name')->where('id','=',$s)->first();
            array_push($myarray,$services);

        }
        return view('admin.surveyer.report.addReport',compact('myarray','id'));
    }

    public function store(Request $request){
        $data = $request->all();
        $job_id = $data['job_id'];
        $message= $data['message'];
        $service_icon= $data['service_icon'];
       if(isset($data) && !empty($data)){
        $picture = '';
       
        if ($request->hasFile('service_icon')) {
    
            if(!empty($check->service_icon)){
                @unlink(fileurlReport().$check->service_icon);
            }

            $files = $request->file('service_icon');
            
            foreach($files as $f=>$file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $size = $file->getClientSize();
                $MimeType = $file->getClientMimeType();

               $picture = uniqid(rand()).$filename;
               $images[] = array(
                   'image'=>$picture
               );
                
                $destinationPath = public_path() . '/uploads/surveyorReport/';
                $file->move($destinationPath, $picture);
            } 
            
        }
        foreach($data['service_id'] as $t=>$id){
            
            $sub = 'sub_service_name_'.$id ;
            $time = 'estimate_time_'.$id ;
            $price = 'estimate_price_'.$id ;
        
            $sub_service_name = array_filter($request->$sub) ;
            $estimate_time = array_filter($request->$time) ;
            $estimate_price = array_filter($request->$price) ;
            
             $myarray= array();
            foreach($sub_service_name as $k=>$data){

                $all = array(
                'sub_service_name' => $data,
                'estimate_time' => $estimate_time[$k] ,
                'estimate_price' => $estimate_price[$k] 
            );
                array_push($myarray,$all);

            }
            
            $myarray1[] = array(
                //'user_id' => 17,
                'job_id'=> $job_id,
                'service_id' => $id ,
                'message'=> $message[$t],
                'service_img'=>$images[$t]['image'],
                'data' => json_encode($myarray)
            );
        } 

        

        //prd($myarray1);
        // $check = DB::table('surveyor_reports')
        //         ->select('surveyor_reports.*')
        //         ->where('service_id','=',$id)
        //         ->where('job_id','=',$job_id)
        //         ->first();
        // if(isset($check) && !empty($check)){

            $dataInsert = DB::table('surveyor_reports')->insert($myarray1);
       // }
            $jobstatus = array(
                'status' => 2 
            );
            $statusUpdate = DB::table('jobs')->where('id','=',$job_id)->update($jobstatus);

            if($dataInsert){
                return redirect('admin/surveyers/scheduleSurveyers')->with('message',"Report on a Job is added successfully.");
            }else{
                return redirect('admin/surveyers/scheduleSurveyers')->with('message',"Something went wrong! Please try again after some time.");
            }
       }else{
           return redirect('admin/surveyers/scheduleSurveyers')->with('message',"Something went wrong! Please try again after some time.");
       }

    }


    /**
     * New design work start
     */

    public function schudlelist(){
        
        return view('admin.surveyer.schudlelist');
    }
    
}
