<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterMargin;

class MarginController extends Controller
{
    public function index(){
        $margins = MasterMargin::get();
        return view('admin.margin.index',compact('margins'));
    }

    public function create(){
        return view('admin.margin.form');
    }

    public function store(Request $request){
        $data = $request->all();
        $check = MasterMargin::where('amount','=',$data['amount'])->where('margin','=',$data['margin'])->first();

        if(empty($check)){
            $margin = MasterMargin::InsertMargin($data);
            if($margin > 0){
                return redirect('admin/margins')->with('message',"Margin is added successfully.");
            }else{
                return redirect('admin/margins')->with('message',"Something went wrong! Please try again after some time.");
            }
        }else{
            return redirect('admin/margins')->with('meassage',"This Margin is already exist! Please try again with different margin values.");
        }

    }

    public function destroy($id){
        $deletedata = MasterMargin::destroy($id);
        if($deletedata){
            return redirect('admin/margins')->with('message',"Margin deleted successfully.");;
        }else{
            return redirect('admin/margins')->with('message',"Something went wrong! Please try again after some time.");;
        }
        
    }
}
