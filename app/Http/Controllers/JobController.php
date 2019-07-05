<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs;
use App\BlockSlotDate;
use App\BlockSlotTime;
use App\Slot;
use App\Employee;
use App\Survey;
use Auth;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $date = date('Y-m-d');
       
        $jobs = Jobs::getJobDataDate($date);
        $surver_emp = Employee::where('emp_role','=','Surveyor')->get();
        return view('admin.surveyer.index',compact('jobs','surver_emp'));
    }

    public function getAllJObsAjax(Request $request){
        $data = $request->all();

        $jobs = Jobs::getJobDataDate($data['date']);
       
        if(isset($jobs) && !empty($jobs)){
           return json_encode($jobs);
            
        }else{
            echo '0';
        }
    }

    public function getSurveyorserviceTypeAjax(Request $request){
        $data = $request->all();

        $surveyors = Jobs::getJobDatatype($data['service_type']);
       
        if(isset($surveyors) && !empty($surveyors)){
           return json_encode($surveyors);
            
        }else{
            echo '0';
        }
    }

    public function getAllSurveyerSlotAjax(Request $request){
        $data = $request->all();

        $d = str_replace('/', '-', $data['date']);
        $blockslot = BlockSlotDate::where('block_date','=',date("Y-m-d", strtotime($d)))->first();
       
        if(isset($blockslot) && !empty($blockslot)){

            $blockslot['message'] = "Date is Blocked!";

        }else{

            $blockslot = BlockSlotTime::select('block_slot_times.*','slots.slot_timename','slots.slotstart_time','slots.slotend_time')
                        ->leftjoin('slots','slots.id','=','block_slot_times.slot_id')
                        ->where('slot_date','=',date("Y-m-d", strtotime($d)))
                        ->get();


            
            foreach($blockslot as $sl){
                //$sl['slot_dt'] = Slot::where('id','!=',$sl->slot_id)->get();
                //$sl['slot_dt'] = $sl->slot_id != ($slots[0]->slot_id || $slots[1]->slot_id || $slots[2]->slot_id);
                
                if(!empty($sl->slot_id)){
                    $sl['button'] = 'Block';
                }else{
                    $sl['button'] = '';
                }
            }
            
        }
        //$slots = Slot::get();

        if(isset($blockslot) && !empty($blockslot)){
           return json_encode($blockslot);
            
        }else{
            echo '0';
        }
    }

    public function store(Request $request){
        $data = $request->all();

        if(isset($data) && !empty($data)){
            $surveyer = Survey::InsertSurveyer($data);
            $data1 = array(
                'status'=>1
            );
            $updateAllotStatus = Jobs::where('id','=',$data['job_id'])->update($data1);

            if(($surveyer > 0) && $updateAllotStatus){
                return redirect('admin/surveyers')->with('message',"Surveyer is Assigned successfully.");
            }else{
                return redirect('admin/surveyers')->with('message',"Something went wrong! Please try again after some time.");
            }
        }else{
            return redirect('admin/surveyers')->with('meassage',"Something went wrong! Please try again after some time.");
        }
    }
}
