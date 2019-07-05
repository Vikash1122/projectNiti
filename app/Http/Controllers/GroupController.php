<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Employee;
use App\Vehicle;
use App\Group;
use App\GroupEmployee;
use Auth;


class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        //$date = date('Y-m-d');
        $groups = Group::getGroupdataaccDate();
        return view('admin.order.group.index',compact('groups'));
    }

    public function search(Request $request)
    {
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $groups = Group::getGroupdataaccDate1($keyword);
        }else{
             //$groups = Group::get();
             $groups = Group::getGroupdataaccDate();
           
        }
       return json_encode($groups);
    }
    
    public function create(){
        $services = Service::get();
        //$employee = Employee::select('employee_name','id')->where('status','=',1)->get();
        //$teamLead = Employee::where('emp_role','=','Team Leader')->where('status','=',1)->get();
        $GroupTem = Group::select(\DB::raw("(GROUP_CONCAT(DISTINCT team_leader SEPARATOR ',')) as 'team_leader'"),(\DB::raw("(GROUP_CONCAT(DISTINCT driver SEPARATOR ',')) as 'driver'")),\DB::raw("(GROUP_CONCAT(DISTINCT group_emp SEPARATOR ',')) as 'group_emp'"))->get();
       // prd($GroupTem->toArray());
        // $driver = Employee::where('emp_role','=','Driver')->where('status','=',1)->get();
        $vehicle = Vehicle::get();
        foreach($GroupTem as $dt){
            $team = explode(',',$dt->team_leader);
            $driver1 = explode(',',$dt->driver);
            $empNam = explode(',',$dt->group_emp);
            $teamLead = Employee::where('emp_role','=','Team Leader')->where('status','=',1)->whereNotIn('id',$team)->get();
            $driver = Employee::where('emp_role','=','Driver')
                    ->where('status','=',1)
                    ->whereNotIn('id',$driver1)
                    ->get();
            $employee = Employee::select('employee_name','id')
                        ->where('status','=',1)
                        ->whereNotIn('id',$empNam)
                        ->where('emp_role','!=','Team Leader')
                        ->where('emp_role','!=','Driver')
                        ->get();
            //print_r($teamLead);
            }//die;
        return view('admin.order.group.form',compact('services','employee','teamLead','driver','vehicle'));
    }

    public function store(Request $request){
        $data = $request->all();
        $services = implode(',',$data['group_service']);
        $data['ser'] = $services;
        $employee = implode(',',$data['group_emp']);
        $data['emp_id'] = $employee;
       
        $group = Group::InsertGroup($data);

        // foreach($data['group_emp'] as $k=>$emp){
        //     $grp_employees = array(
        //         'group_id'=>$group,
        //         'employee_id'=>$emp,
        //         'employee_role'=>$data['employee_role'][$k]
        //     );

        //     $employeeinsert = GroupEmployee::insert($grp_employees);
        // }

        if(isset($group) && !empty($group)){
            return redirect('admin/orders/groups')->with('message',"Group Created Successfully!");
        }else{
            return redirect('admin/orders/groups')->with('message',"Oops! Something went wrong while creating group.");
        }
    }

    public function getAllGroupsAjax(Request $request){
        $data = $request->all();
        $groups = Group::getGroupdataaccDate($data['date']);

       
        if(isset($groups) && !empty($groups)){
           return json_encode($groups);
            
        }else{
            $groups = [];
            return json_encode($groups);
        }
    }

    public function edit(Request $request, $id){
        $services = Service::get();
        // $employee = Employee::select('employee_name','id','emp_role')->where('status','=',1)->get();
        // $teamLead = Employee::where('emp_role','=','Team Leader')->where('status','=',1)->get();
        // $driver = Employee::where('emp_role','=','Driver')->where('status','=',1)->get();

         $GroupTem = Group::select(\DB::raw("(GROUP_CONCAT(DISTINCT team_leader SEPARATOR ',')) as 'team_leader'"),(\DB::raw("(GROUP_CONCAT(DISTINCT driver SEPARATOR ',')) as 'driver'")),\DB::raw("(GROUP_CONCAT(DISTINCT group_emp SEPARATOR ',')) as 'group_emp'"))->get();
        $vehicle = Vehicle::get();
        foreach($GroupTem as $dt){
            $team = explode(',',$dt->team_leader);
            $driv = explode(',',$dt->driver);
            $empNam = explode(',',$dt->group_emp);
            $teamLead1 = Employee::select('employee_name','id')->where('emp_role','=','Team Leader')->where('status','=',1)->whereNotIn('id',$team)->get();
            $driver1 = Employee::select('id','employee_name')->where('emp_role','=','Driver')->where('status','=',1)->whereNotIn('id',$driv)->get();
            $employee1 = Employee::select('id','employee_name')->where('emp_role','!=','Team Leader')->where('emp_role','!=','Driver')->where('status','=',1)->whereNotIn('id',$empNam)->get();
            // foreach($teamLead1 as $val){
            //  $arr2[] = array('id'=>$val['id'],'employee_name'=>$val['employee_name']);   
            // }
        }
//prd($driver1->toArray());

             $groupData = Group::getGroupdata($id);
            //prd($groupData);
             $arr = array(array(
                'id'=>$groupData[0]->team_leader,
                'employee_name'=>$groupData[0]->teamleader
            ));
             //$teamLead2 = array($teamLead1);
             if(isset($teamLead1[0]) && !empty($teamLead1[0])){
                $teamLead = array_merge($teamLead1->toArray(),$arr);
             }else{
                $teamLead = $arr;
                //print_r("sadfjk");
             }
            //prd($teamLead);

            $arr1 = array(array(
                'id'=>$groupData[0]->id,
                'employee_name'=>$groupData[0]->driver
                ));
//prd($arr1);
             //prd($driver1->toArray());
            //$driver2 = array($driver1);
             if(isset($driver1[0]) && !empty($driver1[0])){
                $driver = array_merge($arr1,$driver1->toArray());
              // print_r("sadfjk");
             }else{
                $driver = $arr1;
                //print_r("lkasdjalskdfjsadjfkj");
             }
         //prd($driver);
           //  prd($driver1->toArray());die;
             $arr2 = array($groupData[0]->employee);
             //prd($arr2[0]->toArray());
             if(isset($employee1[0]) && !empty($employee1[0])){
                $employee = array_merge($employee1->toArray(),$arr2[0]->toArray());
             }else{
                $employee = ($arr2[0]->toArray());
                //print_r("ajsdkf");
             }
//prd($employee);
             if($employee[0] != '' && $driver[0] != '' && $teamLead[0] != ''){
                $employeewithdt = array_merge($employee,$driver,$teamLead);
             }else{
                $employeewithdt = array_merge($arr,$arr1,$arr2);
             }
             //prd($employeewithdt);
         $groupData[0]['serv'] = explode(',',$groupData[0]->group_service);
        return view('admin.order.group.edit',compact('groupData','id','services','employee','teamLead','driver','vehicle','employeewithdt'));
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $services = implode(',',$data['group_service']);
        $data['ser'] = $services;
        $employee = implode(',',$data['group_emp']);
        $data['emp_id'] = $employee;
        $check = Group::findOrfail($id);
        if(isset($check) && !empty($check)){
            $update = Group::updateGroup($data, $id);
        }
        
        // $group = Group::InsertGroup($data);

        if(isset($update) && !empty($update)){
            return redirect('admin/orders/groups')->with('message',"Group Updated Successfully!");
        }else{
            return redirect('admin/orders/groups')->with('message',"Oops! Something went wrong while updating group.");
        }
    }

    public function destroy($id)
    {
        $deletedata = Group::destroy($id);
        $deletegroup_emp = GroupEmployee::where('group_id','=',$id)->delete();
        if($deletedata){
            return redirect('admin/orders/groups')->with('message',"Group record deleted successfully.");
        }else{
            return redirect('admin/orders/groups')->with('message',"Something went wrong! While deleting Group Record.");
        }
        
    }
}
