<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slot;
use App\BlockSlotTime;
use App\BlockSlotDate;
use DB;
use Auth;

class SlotController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slots = Slot::get();
        //print_r($slots);die();
        return view('admin.slot.index',compact('slots'));
    }

    public function store(Request $request){
        $data = $request->all();
        //print_r($data);die();
        $slot = new Slot();
        $slot->slot_timename = $data['slot_timename'];
        $slot->slotstart_time = $data['slotstart_time'];
        $slot->slotend_time = $data['slotend_time'];
        $slot->limit_request = $data['limit_request'];
        $slot->status = 1;
        $slot->save();
        if($slot){
            return redirect('admin/slots');
        }else{
            return redirect('admin/slots');
        }
        
    }

    public function getAllslotsajax(Request $request){
        $data = $request->all();
        $slots = Slot::get();
        $blockslottime = DB::table('slots')
                ->select('slots.*','block_slot_times.status','block_slot_times.slot_date')
                ->leftjoin('block_slot_times','block_slot_times.slot_id','=','slots.id')
                ->where('slot_date','=',$data['date'])
                ->groupBy('slots.id')
                ->get();
                //prd($blockslottime);
        //$blockslottime = BlockSlotTime::where('slot_date','=',$data['date'])->get();
        $blockslotdate = BlockSlotDate::where('block_date','=',$data['date'])->first();
        //print_r($blockslottime);die();
        if(isset($slots) && !empty($slots)){
            //print_r(isset($blockslottime[0]) && !empty($blockslottime[0]));die();
            if(isset($blockslottime[0]) && !empty($blockslottime[0])){


                return json_encode($blockslottime);

            }elseif(isset($blockslotdate) && !empty($blockslotdate)){
                $blockslotdate = [];
                return json_encode($blockslotdate);
                //return json_encode($blockslotdate);
                //echo '0';

            }else{
                return json_encode($slots);
            }
            
        }else{
            $slots = [];
            return json_encode($slots);
        }
    }

    
    public function blockslot(Request $request){
        $data = $request->all();
        $check = BlockSlotTime::where('slot_date','=',$data['date'])
                ->where('status','=',$data['status'])
                ->where('slot_id','=',$data['slot_id'])
                ->first();
        if($check == ''){
            $blockslot = new BlockSlotTime();
            $blockslot->slot_id = $data['slot_id'];
            $blockslot->slot_date = $data['date'];
            $blockslot->status = $data['status'];
            $blockslot->save();

            if($blockslot){
                echo "1";
            }else{
                echo "0";
            }
        }
        
    }

    public function blockDate(Request $request){
        $data = $request->all();
        $blockdate = new BlockSlotDate();
        $blockdate->status = $data['status'];
        $blockdate->block_date = $data['date'];
        $blockdate->save();
        
        if($blockdate){
            echo "1";
        }else{
            echo "0";
        }
    }

}
