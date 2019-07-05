<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use Auth;
use DB;
use App\Service;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $vehicles = Vehicle::getall();
        return view('admin.vehicle.index', compact('vehicles'));

    }

    public function search(Request $request)
    {
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $vehicles = Vehicle::where('vehicle_no', 'LIKE', "%$keyword%")
                ->get();
            
        }else{
             $vehicles = Vehicle::get();
           
        }

       return json_encode($vehicles);
    }

    public function vehicleOrder($id)
    {
        $vehicle = Vehicle::with('drivers')->findOrfail($id);
        foreach($vehicle->drivers as $driver){
            $id1 = array(
                $driver->driver,
                $driver->team_leader
            );
            $empIds = explode(',',$driver->group_emp);
            $ids = array_unique(array_merge($empIds,$id1));
            $driver['ids'] = $ids;
            $emp = DB::table('employees')
                    ->select('id','employee_name','emp_mobile','emp_profile')
                    ->whereIn('id',$ids)
                    ->get();
            $driver['employees'] = $emp;

            $jobs = DB::table('job_groups')->select('job_id')->where('group_id','=',$driver->id)->first();
            if(isset($jobs->job_id) && !empty($jobs->job_id)){
                $driver['job_id'] = $jobs->job_id;
            }else{
                $driver['job_id'] = '';
            }
        
            $job = DB::table('jobs')
                    ->select('jobs.service_id','jobs.job_date','jobs.amc_id','jobs.status','amcs.address')
                    ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
                    ->where('jobs.id','=',$driver->job_id)
                    ->first();
            if(isset($job->job_date) && !empty($job->job_date)){
                $driver['service_id'] = $job->service_id;
                $driver['job_date'] = $job->job_date;
                $driver['amc_id'] = $job->amc_id;
                $driver['address'] = $job->address;
                $driver['status'] = $job->status;
            }else{
                $driver['service_id'] = '';
                $driver['job_date'] = '';
                $driver['amc_id'] = '';
                $driver['address'] = '';
                $driver['address'] = '';
            }

            $serviceIds = explode(',',$driver->service_id);
            $services = Service::select(DB::raw("(GROUP_CONCAT(DISTINCT service_name SEPARATOR ',')) as 'ser_name' "))
                            ->whereIn('id',$serviceIds)
                            ->first();
            if(isset($services->ser_name) && !empty($services->ser_name)){
                $driver['services'] = $services->ser_name;
            }else{
                $driver['services'] = '';
            }
            
        }
        //prd($vehicle->toArray());
        return view('admin.vehicle.vehicle_order_history',compact('vehicle'));
    }

    public function vehicleJobEmployee(Request $request){
        $data = $request->all();
        $job_id = $data['job_id'];
        if (!empty($job_id)) {
            $groups = DB::table('job_groups')->select('group_id')->where('job_id','=',$job_id)->first();
            if(isset($groups->group_id) && !empty($groups->group_id)){
                $group_id = $groups->group_id;
                $groups = DB::table('groups')->select('group_emp','driver','team_leader')
                    ->where('id','=',$group_id)->first();
                $id1 = array(
                    $groups->driver,
                    $groups->team_leader
                );
                $empIds = explode(',',$groups->group_emp);
                $ids = array_unique(array_merge($empIds,$id1));
                $emp = DB::table('employees')
                        ->select('id as emp_id','employee_name','emp_mobile','emp_profile')
                        ->whereIn('id',$ids)
                        ->get();
               
                
            }
            
        }
        return json_encode($emp);
    }

    public function vehicleInfo($id)
    {
        $vehicle = Vehicle::with('drivers')->findOrfail($id);
        foreach($vehicle->drivers as $driver){
            $emp = DB::table('employees')->select('employee_name','emp_mobile','emp_profile')->where('id','=',$driver->driver)->first();
            $driver['employee_name'] = $emp->employee_name;
            $driver['emp_mobile'] = $emp->emp_mobile;
            $driver['emp_profile'] = $emp->emp_profile;

            $jobs = DB::table('job_groups')->select('job_id')->where('group_id','=',$driver->id)->first();
            if(isset($jobs->job_id) && !empty($jobs->job_id)){
                $driver['job_id'] = $jobs->job_id;
            }else{
                $driver['job_id'] = '';
            }
        
            $job = DB::table('jobs')->select('job_date')->where('id','=',$driver->job_id)->first();
            if(isset($job->job_date) && !empty($job->job_date)){
                $driver['job_date'] = $job->job_date;
            }else{
                $driver['job_date'] = '';
            }
            
        }
        
        return view('admin.vehicle.viewVehicle',compact('vehicle'));
    }

    public function create(){
        return view('admin.vehicle.form');
    }


    public function store(Request $request){
        $data = $request->all();

        $check = Vehicle::where('modal_no','=',$data['modal_no'])->where('vehicle_no','=',$data['vehicle_no'])->first();

        if(empty($check)){

            $picture = '';
            if ($request->hasFile('registration_card')) {
                
                $file = $request->file('registration_card');
                
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $size = $file->getClientSize();
                $MimeType = $file->getClientMimeType();

                $picture = time().uniqid(rand()).$filename;
                $destinationPath = uploadPath();
                $file->move($destinationPath, $picture);
                
            } 

            $picture1 = '';
            if ($request->hasFile('vehicle_pic')) {
                
                $file = $request->file('vehicle_pic');
                
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $size = $file->getClientSize();
                $MimeType = $file->getClientMimeType();

                $picture1 = time().uniqid(rand()).$filename;
                $destinationPath = uploadPath();
                $file->move($destinationPath, $picture1);
                
            } 

           $vehicle = Vehicle::InsertVehicle($data,$picture,$picture1);
            if($vehicle > 0){
                return redirect('admin/vehicles')->with('message',"Vehicle is added successfully.");
            }else{
                return redirect('admin/vehicles')->with('message',"Something went wrong! Please try again after some time.");
            }
        }else{
            return redirect('admin/vehicles')->with('message',"This Vehicle is already exist. Please Add Another Vehicle with Unique Vehicle Model Number!");
        }
        
        
    }


    public function edit($id){

        $vehicle = Vehicle::findOrfail($id);
        return view('admin.vehicle.edit',compact('vehicle','id'));
    }

    public function update(Request $request, $id){
       $data = $request->all();

       if(isset($id) && !empty($id) && !empty($data)){
        $check = Vehicle::findOrfail($id);
        if(!empty($check)){
            
            $picture = '';
            if ($request->hasFile('registration_card')) {

                if(!empty($check->registration_card)){
                    @unlink(uploadPath().$check->registration_card);
                }
                
                $file = $request->file('registration_card');
                
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $size = $file->getClientSize();
                $MimeType = $file->getClientMimeType();
                $picture = time().uniqid(rand()).$filename;
                $destinationPath = uploadPath();
                $file->move($destinationPath, $picture);
                
            }else{
                $picture = $check->registration_card;
            }
            
            $picture1 = '';
            if ($request->hasFile('vehicle_pic')) {

                if(!empty($check->vehicle_pic)){
                    @unlink(uploadPath().$check->vehicle_pic);
                }
                
                $file = $request->file('vehicle_pic');
                
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $size = $file->getClientSize();
                $MimeType = $file->getClientMimeType();
                $picture1 = time().uniqid(rand()).$filename;
                $destinationPath = uploadPath();
                $file->move($destinationPath, $picture1);
                
            }else{
                $picture1 = $check->vehicle_pic;
            } 
            
            $update = Vehicle::updateVehicle($data,$id, $picture,$picture1);
        }
        if(isset($update) && !empty($update)){
            return redirect('admin/vehicles')->with('message',"Vehicle record updated successfully.");
        }else{
            return redirect('admin/vehicles')->with('message',"Something went wrong! Please try again after some time.");
        }
       }else{
            return redirect('/admin/vehicles')->with('message',"Something went wrong! Please try again after some time.");
       }
    }

    public function destroy($id)
    {
        $deletedata = Vehicle::destroy($id);
        if($deletedata){
            return redirect('admin/vehicles')->with('message',"Vehicle record deleted successfully.");
        }else{
            return redirect('admin/vehicles')->with('message',"Something went wrong! While deleting Vehicle.");
        }
        
    }
}
