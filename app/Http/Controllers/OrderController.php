<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Group;
use App\JobGroup;
use App\SurveyorReport;
use App\Employee;
use App\Slot;
use App\Vehicle;
use App\Jobs;
use App\Service;
use App\JobCard;
use Auth;
use DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $teamleader = Employee::select('id','employee_name')->where('emp_role','=','Team Leader')->get();
        $vehicles = Vehicle::select('id','vehicle_no')->get();
        $amc_type = 1;
        $orders = Order::getAllOrderData($amc_type);

       // prd($orders);
        return view('admin.order.index',compact('orders','teamleader','vehicles'));
    }

    public function search(Request $request){
        $keyword = $request->get('search');
        $searchDay = '';
        $searchdatakey = '';
        $amc_type = 1;
        if (!empty($keyword)) {
            $orders = Order::allOrderFilterData($amc_type,$keyword,$searchDay,$searchdatakey);
            
        }else{
            
            $orders = Order::getAllOrderData($amc_type);
        }

       return json_encode($orders);
    }

    public function filter(Request $request){
        $keyword = '';
        $searchDay = $request->get('searchDay');
        $searchdatakey = $request->get('searchOrder');
        $amc_type = 1;
        if (!empty($searchDay) || !empty($searchdatakey)) {
            $orders = Order::allOrderFilterData($amc_type,$keyword,$searchDay,$searchdatakey);
            
        }else{
            $orders = Order::getAllOrderData($amc_type);
        }

       return json_encode($orders);
    }

    public function statusFilter(Request $request){
        $status = $request->get('status');
        $amc_type = 1;
        if (!empty($status) && ($status != 'All')) {
            $orders = Order::allOrderFilterStatus($amc_type,$status);
            
        }else{
            $orders = Order::getAllOrderData($amc_type);
        }

       return json_encode($orders);
    }

    public function create(){
        return view('admin.job.form');
    }
    /**Jobs Section Start */
    public function jobsIndex(){

        $teamleader = Employee::select('id','employee_name')->where('emp_role','=','Team Leader')->get();
        $vehicles = Vehicle::select('id','vehicle_no')->get();
        $amc_type = 0;
        $orders = Order::getAllOrderData($amc_type);

        //prd($orders);
        return view('admin.order.job_index',compact('orders','teamleader','vehicles'));
    }

    public function jobsSearch(Request $request){
        $keyword = $request->get('search');
        $searchDay = '';
        $searchdatakey = '';
        $amc_type = 0;
        if (!empty($keyword)) {
            $orders = Order::allOrderFilterData($amc_type,$keyword,$searchDay,$searchdatakey);
            
        }else{
            
            $orders = Order::getAllOrderData($amc_type);
        }

       return json_encode($orders);
    }

    public function jobsfilter(Request $request){
        $keyword = '';
        $searchDay = $request->get('searchDay');
        $searchdatakey = $request->get('searchOrder');
        $amc_type = 0;
        if (!empty($searchDay) || !empty($searchdatakey)) {
            $orders = Order::allOrderFilterData($amc_type,$keyword,$searchDay,$searchdatakey);
            
        }else{
            $orders = Order::getAllOrderData($amc_type);
        }

       return json_encode($orders);
    }

    public function jobsStatusFilter(Request $request){
        $status = $request->get('status');
        $amc_type = 0;
        if (!empty($status) && ($status != 'All')) {
            $orders = Order::allOrderFilterStatus($amc_type,$status);
            
        }else{
            $orders = Order::getAllOrderData();
        }

       return json_encode($orders);
    }
    /**Jobs Section End */
    public function approvedOrders(){
        $date = date('Y-m-d');
        $orders = Order::getAllAppDataDate($date);
        //$groups = Group::where('group_date','=','2018-11-01')->get();
        $groups = Group::get();
        $employees = Employee::where('status','=',1)->get();
        $slots = Slot::get();
        $vehicles = Vehicle::get();
        return view('admin.order.approvedOrder',compact('orders','groups','employees','slots','vehicles'));
    }

    public function getallApprovedAjax(Request $request){
        $data = $request->all();

        $orders = Order::getAllApprovedDate($data);
       
        if(isset($orders) && !empty($orders)){
           return json_encode($orders);
            
        }else{
            $orders = [];
            return json_encode($orders);
        }
    }


    public function viewOrder($id){
        $jobcard = JobCard::getCardTotalData($id);
        $job = Jobs::vieworderDetail($id);
       // prd($job->toArray());
        return view('admin.order.show',compact('jobcard','id','job'));
    }

    /**New Design && new functionality Implimentation Start*/

    public function show($id){
        //$order = SurveyorReport::viewJobReport($id);
        $jobcard = JobCard::getCardTotalData($id);
        $job = Jobs::findOrfail($id);
        return view('admin.order.order_detail',compact('jobcard','id','job'));
    }

    public function sendProposal(Request $request,$id){
        $data = $request->all();
        
        if(isset($data) && !empty($data)){
            $total_price = $data['total_price'];
            foreach($data['service_id'] as $t=>$sid){
                
                $sub = 'sub_service_id_'.$sid ;
                $prod = 'product_id_'.$sid ;
                $sub_price = 'sub_service_price_'.$sid ;
                $price = 'service_price_'.$sid ;
                $text = 'text_content_'.$sid ;
                if(isset($request->$sub) && !empty($request->$sub)){
                    $sub_service_name = array_filter($request->$sub) ;
                }else{
                    $sub_service_name = '';
                }

                if(isset($request->$prod) && !empty($request->$prod)){
                    $product_id = array_filter($request->$prod) ;
                }else{
                    $product_id = '';
                }

                if(isset($request->$sub_price) && !empty($request->$sub_price)){
                    $sub_service_price = array_filter($request->$sub_price) ;
                }else{
                    $sub_service_price = '';
                }

                if(isset($request->$price) && !empty($request->$price)){
                    $service_price = array_filter($request->$price) ;
                }else{
                    $service_price = '';
                }

                if(isset($request->$text) && !empty($request->$text)){
                    $text_content = array_filter($request->$text) ;
                }else{
                    $text_content = '';
                }
                
                if(isset($text_content) && !empty($text_content)){
                   
                    $myarray= array();
                    foreach($text_content as $k=>$data){
                        $all = array(
                            'job_id' =>$id,
                            'service_id' =>$sid,
                            'text_content' => isset($data) ? $data : NULL
                        );
                            array_push($myarray,$all);
                            
                    }//print_r($myarray);
                        $dataInsert = DB::table('job_proposals')->insert($myarray);
                }else{
                    
                   
                    
                    $myarray= array();
                    foreach($sub_service_name as $k=>$data){

                        $all = array(
                        'job_id' =>$id,
                        'service_id' =>$sid,
                        'sub_service_id' => $data,
                        'product_id' => $product_id[$k],
                        'sub_service_price' => $sub_service_price[$k],
                        'service_price' => $service_price[0],
                        'total_price' => $total_price
                    );
                        array_push($myarray,$all);
            
                    }
                    $dataInsert = DB::table('job_proposals')->insert($myarray);
                }
                
            
            }
       
            $jobstatus = array(
                'status' => 6  //job proposed to Service team
            );
            $statusUpdate = DB::table('jobs')->where('id','=',$id)->update($jobstatus);

            if($dataInsert){
                return redirect('admin/orders/approvedOrders')->with('message',"Job Card Proposal sent successfully.");
            }else{
                return redirect('admin/orders/approvedOrders')->with('message',"Something went wrong! Please try again after some time.");
            }
       }else{
           return redirect('admin/orders/approvedOrders')->with('message',"Something went wrong! Please try again after some time.");
       }
    }


    public function viewProposal($id){
        $jobcard = JobCard::getCardTotalData($id);
        $job = Jobs::findOrfail($id);
        return view('admin.order.editProposal',compact('jobcard','id','job'));
    }

    public function updateProposal(Request $request,$id){
        $data = $request->all();
        
        if(isset($data) && !empty($data)){
            foreach($data['service_id'] as $t=>$sid){
               
                $sub = 'sub_service_id_'.$sid ;
                $prod = 'product_id_'.$sid ;
                $sub_price = 'sub_service_price_'.$sid ;
                $price = 'service_price_'.$sid ;
                $text = 'text_content_'.$sid ;
                if(isset($request->$sub) && !empty($request->$sub)){
                    $sub_service_name = array_filter($request->$sub) ;
                }else{
                    $sub_service_name = '';
                }

                if(isset($request->$prod) && !empty($request->$prod)){
                    $product_id = array_filter($request->$prod) ;
                }else{
                    $product_id = '';
                }

                if(isset($request->$sub_price) && !empty($request->$sub_price)){
                    $sub_service_price = array_filter($request->$sub_price) ;
                }else{
                    $sub_service_price = '';
                }

                if(isset($request->$price) && !empty($request->$price)){
                    $service_price = array_filter($request->$price) ;
                }else{
                    $service_price = '';
                }

                if(isset($request->$text) && !empty($request->$text)){
                    $text_content = array_filter($request->$text) ;
                }else{
                    $text_content = '';
                }

                if(isset($text_content) && !empty($text_content)){
                    $deleteData = DB::table('job_proposals')->where('job_id','=',$id)->delete();
                    $myarray= array();
                    foreach($text_content as $k=>$data){
                        $all = array(
                            'job_id' =>$id,
                            'service_id' =>$sid,
                            'text_content' => isset($data) ? $data : NULL
                        );
                            array_push($myarray,$all);
                            
                    }//print_r($myarray);
                        $dataInsert = DB::table('job_proposals')->insert($myarray);
                }else{
                    $deleteData = DB::table('job_proposals')->where('job_id','=',$id)->delete();
                    $total_price = $data['total_price'];
                    $myarray= array();
                    foreach($sub_service_name as $k=>$data){

                        $all = array(
                        'job_id' =>$id,
                        'service_id' =>$sid,
                        'sub_service_id' => $data,
                        'product_id' => $product_id[$k],
                        'sub_service_price' => $sub_service_price[$k],
                        'service_price' => $service_price[0],
                        'total_price' => $total_price
                    );
                        array_push($myarray,$all);
            
                    }
                    $dataInsert = DB::table('job_proposals')->insert($myarray);
                }
                
            
            }
       
            $jobstatus = array(
                'status' => 6  //job proposed to Service team
            );
            $statusUpdate = DB::table('jobs')->where('id','=',$id)->update($jobstatus);

            if($dataInsert){
                return redirect('admin/orders/approvedOrders')->with('message',"Job Card Proposal sent successfully.");
            }else{
                return redirect('admin/orders/approvedOrders')->with('message',"Something went wrong! Please try again after some time.");
            }
       }else{
           return redirect('admin/orders/approvedOrders')->with('message',"Something went wrong! Please try again after some time.");
       }
    }

    public function isRejectAjax(Request $request){
        $data = $request->all();
        //prd($data['job_id']);
        $jobstatus = array(
            'status' => 9  //job rejected by Admin
        );
        $statusUpdate = DB::table('jobs')->where('id','=',$data['job_id'])->update($jobstatus);
       
        if(isset($statusUpdate) && !empty($statusUpdate)){
           echo 1;
            
        }else{
            echo 0;
        }
    }


    /**New Design && new functionality Implimentation End*/


    public function allGroupsAjax(Request $request){
        $data = $request->all();
        
        $groups = Group::getGroup($data['group_id']);
       
        if(isset($groups) && !empty($groups)){
           return json_encode($groups);
            
        }else{
            echo '0';
        }
    }

    public function allotGroup(Request $request){
        $data = $request->all();
        if(isset($data['group_id']) && !empty($data['group_id'])){
            $insert = JobGroup::InsertJobGroupAllot($data);
        }else{
            $insert = JobGroup::InsertJobempAllot($data);
        }
        $update_status = array(
            'status'=>4
        );
        $update = Jobs::where('id',$data['job_id'])->update($update_status);

        if(($insert > 0) && $update){
            return redirect('admin/orders/approvedOrders')->with('message','Group or Individual Alloted Sucessfully!');
        }else{
            return redirect('admin/orders/approvedOrders')->with('message','Oops! Something Went Wrong. Please try again after Some time.');
        }
        //return view('admin.order.order_detail');
    }

    public function getajaxEmployeedata(Request $request){
        $data = $request->all();
        $employee_role =DB::table("employees")
                    ->where("id",$data['employee_id'])
                    ->select("emp_role","id")->first();
        return json_encode($employee_role);
    }

    public function allotedOrders(){
        $date = date('Y-m-d');
        $orders = Order::getAllAllotedgroupDate($date);
        return view('admin.order.allotedOrders',compact('orders'));
    }

    public function getallAllotedAjax(Request $request){
        $data = $request->all();

        $orders = Order::getAllAllotedbyDate($data);
       
        if(isset($orders) && !empty($orders)){
           return json_encode($orders);
            
        }else{
            $orders = [];
            return json_encode($orders);
        }
    }


    public function getAllotedserviceTypeAjax(Request $request){
        $data = $request->all();

        $orders = Order::getAllAllotedgroupType($data);
       
        if(isset($orders) && !empty($orders)){
           return json_encode($orders);
            
        }else{
            $orders = [];
            return json_encode($orders);
        }
    }

    public function getallFilterAjax(Request $request){
        $data = $request->all();

        $orders = Order::getAllOrderfilterData($data);
       
        if(isset($orders) && !empty($orders)){
           return json_encode($orders);
            
        }else{
            $orders = [];
            return json_encode($orders);
        }
    }

    public function filterDropDOwnAjax(Request $request){
        $data = $request->all();

        $orders = Order::getAllAllotedgroupType($data);
       
        if(isset($orders) && !empty($orders)){
           return json_encode($orders);
            
        }else{
            $orders = [];
            return json_encode($orders);
        }
    }

    

    /**
     * New design work start
     */

    public function listOrders(){

        return view('admin.order.activeOrders');
    }

    /**
     * New design work end
     */



     /**
     * Service Team Panel work start
     */

    public function requestedJobs(){
        if (Auth::check()){
            $st = 4;
            $alljobs = Order::getAllAllotedcurrent($st);
            return view('admin.order.requestedJobs',compact('alljobs'));
        }else{
            return redirect('/admin/login');
        }
    }


    public function jobCard($id){
        if (Auth::check()){
            $myarray= array();
            $job_services = Jobs::select('service_id')
                        ->where('id','=',$id)
                        ->first();
            $st = explode(',',$job_services->service_id);
            foreach($st as $s){
                $services = Service::select('id','service_name')->where('id','=',$s)->first();
                array_push($myarray,$services);

            }
            
            return view('admin.order.jobCard',compact('id','myarray'));
        }else{
            return redirect('/admin/login');
        }
    }

    public function ajaxjobCard(Request $request){
        if (Auth::check()){
            $data = $request->all();
            $job_id = $data['job_id'];
            $myarray= array();
            $job_services = Jobs::select('service_id')
                        ->where('id','=',$job_id)
                        ->first();
            $st = explode(',',$job_services->service_id);
            foreach($st as $s){
                $services = Service::select('id','service_name')->where('id','=',$s)->first();
                array_push($myarray,$services);

            }
            
            if(isset($myarray) && !empty($myarray)){
                return json_encode($myarray);
                
            }else{
                return json_encode($myarray);
            }
        }else{
            return redirect('/admin/login');
        }
    }

    public function storeJobCard(Request $request){
        if (Auth::check()){
            $data = $request->all();
            $job_id = $data['job_id'];
            $group_id = $data['group_id'];

            if(isset($data) && !empty($data)){
                
                foreach($data['service_id'] as $t=>$id){
                
                    $sub = 'sub_service_id_'.$id ;
                    $product = 'product_id_'.$id ;
                    $unit = 'unit_variable_'.$id ;
                    $qty = 'qty_'.$id ;
                    $text = 'text_content_'.$id ;
                
                    if(isset($request->$sub) && !empty($request->$sub)){
                        $sub_service_name = array_filter($request->$sub) ;
                    }else{
                        $sub_service_name = '';
                    }

                    if(isset($request->$product) && !empty($request->$product)){
                        $product_id = array_filter($request->$product) ;
                    }else{
                        $product_id = '';
                    }

                    if(isset($request->$unit) && !empty($request->$unit)){
                        $unit_variable = array_filter($request->$unit) ;
                    }else{
                        $unit_variable = '';
                    }

                    if(isset($request->$qty) && !empty($request->$qty)){
                        $quantity = array_filter($request->$qty) ;
                    }else{
                        $quantity = '';
                    }

                    if(isset($request->$text) && !empty($request->$text)){
                        $text_content = array_filter($request->$text) ;
                    }else{
                        $text_content = '';
                    }

                    if(isset($text_content) && !empty($text_content)){
                    
                        $myarray= array();
                        foreach($text_content as $k=>$data){
                            $all = array(
                                'job_id' =>$job_id,
                                'group_id' =>$group_id,
                                'service_id' =>$id,
                                'text_content' => isset($data) ? $data : NULL
                            );
                                array_push($myarray,$all);
                                
                        }
                            $dataInsert = DB::table('job_cards')->insert($myarray);
                    }else{
                        $myarray= array();
                        foreach($sub_service_name as $k=>$data){

                            $all = array(
                            'job_id' =>$job_id,
                            'group_id' =>$group_id,
                            'service_id' =>$id,
                            'sub_service_id' => isset($data) ? $data : NULL,
                            'product_id' => isset($product_id[$k]) ? $product_id[$k] : NULL,
                            'unit_variable' => isset($unit_variable[$k]) ? $unit_variable[$k] : NULL,
                            'text_content' => isset($text_content[$k]) ? $text_content[$k] : NULL,
                            'qty' => isset($quantity[$k]) ? $quantity[$k] : NULL 
                        );
                            array_push($myarray,$all);

                        }
                        $dataInsert = DB::table('job_cards')->insert($myarray);
                    }
                    
                
                } 

                $jobstatus = array(
                    'status' => 5 
                );
                $statusUpdate = DB::table('jobs')->where('id','=',$job_id)->update($jobstatus);

                if($dataInsert){
                    return redirect('admin/newjobs')->with('message',"Job Card is added successfully.");
                }else{
                    return redirect('admin/newjobs')->with('message',"Something went wrong! Please try again after some time.");
                }
            }else{
            return redirect('admin/newjobs')->with('message',"Something went wrong! Please try again after some time.");
            }
        }else{
            return redirect('/admin/login');
        }
    }

    public function inNegotiationJobs(){
        if (Auth::check()){
            $st = 5;
            $alljobs = Order::getAllAllotedcurrent($st);
            
            return view('admin.order.inNegotiationJobs',compact('alljobs'));
        }else{
            return redirect('/admin/login');
        }
    }

    public function getAllJobAjax(Request $request){
        if (Auth::check()){
            $data = $request->all();

            $alljobs = Order::getAllNegotiatebyDate($data);
            if(isset($alljobs) && !empty($alljobs)){
            return json_encode($alljobs);
                
            }else{
                return json_encode($alljobs);
            }
        }else{
            return redirect('/admin/login');
        }
    }


    public function view($id){
        if (Auth::check()){
            $jobcard = JobCard::getData($id);
            return view('admin.order.viewJobCard',compact('id','jobcard'));
        }else{
            return redirect('/admin/login');
        }
    }

    public function viewjobProposal($id){
        if (Auth::check()){
            $proposal = JobCard::getProposal($id);
            return view('admin.order.viewProposal',compact('proposal','id'));
        }else{
            return redirect('/admin/login');
        }
    }

    public function jobsReport($id){
        if (Auth::check()){
            $jobreport = JobCard::getData($id);
            return view('admin.order.jobsReport',compact('id','jobreport'));
        }else{
            return redirect('/admin/login');
        }
    }


    public function sendjobsReport(Request $request,$id){
        if (Auth::check()){
            $data = $request->all();
            if(isset($data) && !empty($data)){
        
                foreach($data['service_id'] as $t=>$sid){
                    $status = array(
                        'status' => 1 //1 for complete service job
                    );
                    $dataupdate = DB::table('job_proposals')->where('service_id',$sid)->update($status);
                
                } 
        
                $jobstatus = array(
                    'status' => 8 
                );
                $statusUpdate = DB::table('jobs')->where('id','=',$id)->update($jobstatus);

                if($dataupdate){
                    return redirect('admin/newjobs')->with('message',"Job Report is Sent successfully.");
                }else{
                    return redirect('admin/newjobs')->with('message',"Something went wrong! Please try again after some time.");
                }
            }else{
                return redirect('admin/newjobs')->with('message',"Something went wrong! Please try again after some time.");
            }
        }else{
            return redirect('/admin/login');
        }
    }
    /**
     * Service Team Panel work end
     */


}
