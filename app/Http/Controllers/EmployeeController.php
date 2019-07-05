<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Service;
use App\Countries;
use App\EmpService;
use Auth;
use DB;

class EmployeeController extends Controller
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
        $employee = Employee::getallEmp();
        //prd($employee->toArray());
        return view('admin.employee.index',compact('employee'));
    }

    public function search(Request $request){
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $employee = Employee::getallEmpFilter($keyword);
            
        }else{
            $employee = Employee::getallEmp();
        }

       return json_encode($employee);
    }

    public function empProfile($id)
    {
        $employee = Employee::getEmpDEtail($id);
        return view('admin.employee.viewEmpProfile',compact('employee'));
    }

    public function orderLIst($id)
    {
        $employee = Employee::getEmpallOrderDEtail($id);
        //prd($employee->toArray());
        return view('admin.employee.empOrderList',compact('employee'));
    }

    public function getAllteamsizesajax(Request $request){
        $data = $request->all();
        $empArr ="";
        $group_emp="";
        $teamSize = DB::table('job_groups')
                ->select('job_groups.*','groups.group_emp','groups.id','groups.team_leader','groups.driver')
                ->join('groups','groups.id','=','job_groups.group_id')
                ->where('job_id','=',$data['job_id'])
                ->groupBy('job_groups.group_id')
                ->first();
               // print_r($teamSize); die; 
        if(isset($teamSize) && !empty($teamSize)){
            $group_emp = explode(',',$teamSize->group_emp);
            //print_r($group_emp);die;
            $empArr = array($teamSize->team_leader,$teamSize->driver);
            //print_r($empArr);die;
            $totalEmp = array_unique(array_merge($group_emp,$empArr));
            //print_r($totalEmp);die;
            $total_emp = count($totalEmp);
            //print_r($total_emp);die;
        $teamMember = DB::table('employees')
                    ->select('employees.id','employees.emp_profile','employees.employee_name','employees.emp_mobile')
                    ->whereIn('employees.id',$totalEmp)
                    ->get();
                //print_r($teamMember);die;
            if(isset($teamMember[0]) && !empty($teamMember[0])){

                return json_encode($teamMember);

            }else{
                return json_encode($teamSize);
            }
        }else{
        return json_encode('');
        } 
        
    }


    public function jobDetails($order_id,$id)
    {
        $employee = Employee::getEmpOrderDEtail($order_id,$id);
        return view('admin.employee.job_details',compact('employee'));
    }

    public function create(){
        $services = Service::get();
        $country = Countries::get();
        return view('admin.employee.form',compact('services','country'));
    }

    public function store(Request $request){
        $data = $request->all();

        $service = $data['service_type'];

        $check = Employee::where('employee_code','=',$data['employee_code'])->first();
        if(empty($check)){
            $picture = '';
            if ($request->hasFile('emp_profile')) {
                
                $file = $request->file('emp_profile');
                
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $size = $file->getClientSize();
                $MimeType = $file->getClientMimeType();

                $picture = time().uniqid(rand()).$filename;
                $destinationPath = public_path() . '/uploads/employees/';
                $file->move($destinationPath, $picture);
                
            } 

            $passport_doc = '';
            if ($request->hasFile('passport_doc')) {
                
                $file = $request->file('passport_doc');
                
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $size = $file->getClientSize();
                $MimeType = $file->getClientMimeType();

                $passport_doc = uniqid(rand()).'_passport_'.$filename;
                $destinationPath = public_path() . '/uploads/employees/documents/';
                $file->move($destinationPath, $passport_doc);
                
            } 

            $visa_doc = '';
            if ($request->hasFile('visa_doc')) {
                
                $file = $request->file('visa_doc');
                
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $size = $file->getClientSize();
                $MimeType = $file->getClientMimeType();

                $visa_doc = uniqid(rand()).'_visa_'.$filename;
                $destinationPath = public_path() . '/uploads/employees/documents/';
                $file->move($destinationPath, $visa_doc);
                
            } 

            $emirates_copy = '';
            if ($request->hasFile('emirates_id_copy')) {
                
                $file = $request->file('emirates_id_copy');
                
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $size = $file->getClientSize();
                $MimeType = $file->getClientMimeType();

                $emirates_copy = uniqid(rand()).'_emirates_'.$filename;
                $destinationPath = public_path() . '/uploads/employees/documents/';
                $file->move($destinationPath, $emirates_copy);
                
            } 

            $licence_copy = '';
            if ($request->hasFile('driving_licence_copy')) {
                
                $file = $request->file('driving_licence_copy');
                
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $size = $file->getClientSize();
                $MimeType = $file->getClientMimeType();

                $licence_copy = uniqid(rand()).'_licence_'.$filename;
                $destinationPath = public_path() . '/uploads/employees/documents/';
                $file->move($destinationPath, $licence_copy);
                
            } 

           $employee = Employee::InsertEmployee($data,$picture, $passport_doc,$visa_doc, $emirates_copy, $licence_copy);

        $insertedId = $employee;
        
        
        foreach($service as $ser)
        {
           
               $servicedata[] = array(
                    'employee_id' =>$insertedId,
                    'service_id' => $ser
                );
        }
        $tbdata = DB::table('emp_services')->insert($servicedata);
            if(!empty($employee) && (!empty($tbdata))){
                return redirect('admin/employees')->with('message',"Employee is added successfully.");
            }else{
                return redirect('admin/employees')->with('message',"Something went wrong! Please try again after some time.");
            }
        }else{
            return redirect('admin/employees')->with('message',"This Employee is already exist. Please Add Another Employee with Unique Employee Code!");
        }
        
        
    }

    public function show(Request $request){
        return view('admin.employee.show');
    }

    public function edit($id){
        $employee = Employee::with('empSer')->where('id','=',$id)->first();
       // prd($employee['emp_ser']);
        // foreach($employee['emp_ser'] as $ser){
        //     $serv = implode(',',$employee['emp_ser']->service_id);
        //     print_r($serv);
        // }die();
       // $selectedSer = EmpService::where('id','=',$employee);
        $services = Service::get();
        $country = Countries::get();
        return view('admin.employee.edit', compact('employee','country','services','id'));
    }

    public function update(Request $request, $id){
        $data = $request->all();
        if(isset($id) && !empty($id) && !empty($data)){
            $service = $data['service_type'];
            $check = Employee::findOrfail($id);
            if(!empty($check)){
                    $picture = '';
                if ($request->hasFile('emp_profile')) {

                    if(!empty($check->emp_profile)){
                        @unlink(fileurlemp().$check->emp_profile);
                    }
                    
                    $file = $request->file('emp_profile');
                    
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $size = $file->getClientSize();
                    $MimeType = $file->getClientMimeType();
                    $picture = time().uniqid(rand()).$filename;
                    $destinationPath = public_path() . '/uploads/employees/';
                    $file->move($destinationPath, $picture);
                    
                }else{
                    $picture = $check->emp_profile;
                } 

                    $passport_doc = '';
                if ($request->hasFile('passport_doc')) {

                    if(!empty($check->passport_doc)){
                        @unlink(fileurlempdoc().$check->passport_doc);
                    }
                    
                    $file = $request->file('passport_doc');
                    
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $size = $file->getClientSize();
                    $MimeType = $file->getClientMimeType();
                    $passport_doc = uniqid(rand()).'_passport_'.$filename;
                    $destinationPath = public_path() . '/uploads/employees/documents/';
                    $file->move($destinationPath, $passport_doc);
                    
                }else{
                    $passport_doc = $check->passport_doc;
                } 
                
                    $visa_doc = '';
                if ($request->hasFile('visa_doc')) {

                    if(!empty($check->visa_doc)){
                        @unlink(fileurlempdoc().$check->visa_doc);
                    }
                    
                    $file = $request->file('visa_doc');
                    
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $size = $file->getClientSize();
                    $MimeType = $file->getClientMimeType();
                    $visa_doc = uniqid(rand()).'_visa_'.$filename;
                    $destinationPath = public_path() . '/uploads/employees/documents/';
                    $file->move($destinationPath, $visa_doc);
                    
                }else{
                    $visa_doc = $check->visa_doc;
                }
                
                    $emirates_copy = '';
                if ($request->hasFile('emirates_id_copy')) {

                    if(!empty($check->emirates_id_copy)){
                        @unlink(fileurlempdoc().$check->emirates_id_copy);
                    }
                    
                    $file = $request->file('emirates_id_copy');
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $size = $file->getClientSize();
                    $MimeType = $file->getClientMimeType();
                    $emirates_copy = uniqid(rand()).'_emirates_'.$filename;
                    $destinationPath = public_path() . '/uploads/employees/documents/';
                    $file->move($destinationPath, $emirates_copy);
                    
                }else{
                    $emirates_copy = $check->emirates_id_copy;
                } 

                    $licence_copy = '';
                if ($request->hasFile('driving_licence_copy')) {
                    if(!empty($check->driving_licence_copy)){
                        @unlink(fileurlempdoc().$check->driving_licence_copy);
                    }
                    $file = $request->file('driving_licence_copy');
                    
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $size = $file->getClientSize();
                    $MimeType = $file->getClientMimeType();

                    $licence_copy = uniqid(rand()).'_licence_'.$filename;
                    $destinationPath = public_path() . '/uploads/employees/documents/';
                    $file->move($destinationPath, $licence_copy);
                    
                } else{
                    $licence_copy = $check->driving_licence_copy;
                } 
                $update = Employee::updateEmployee($data, $id, $picture, $passport_doc,$visa_doc, $emirates_copy, $licence_copy);

            }
           

           $deletedata = EmpService::where('employee_id','=',$id)->delete();
           
                foreach($service as $ser)
                {
                    $servicedata[] = array(
                            'employee_id' =>$id,
                            'service_id' => $ser
                        );
                }
                $tbdata = DB::table('emp_services')->insert($servicedata);
            if(!empty($update) && (!empty($tbdata))){
                return redirect('admin/employees')->with('message',"Employee record updated successfully.");
            }else{
                return redirect('admin/employees')->with('message',"Something went wrong! Please try again after some time.");
            }
        }else{
            return redirect('/admin/employees')->with('message',"Something went wrong! Please try again after some time.");
        }
       
    }

    public function destroy($id)
    {
        $deletedata = Employee::destroy($id);
        if($deletedata){
            return redirect('admin/employees')->with('message',"Employee record deleted successfully.");
        }else{
            return redirect('admin/employees')->with('message',"Something went wrong! While deleting Employee Record.");
        }
        
    }
}
