<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\SubServices;
use Auth;
use DB;

class ServiceController extends Controller
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
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;
        //prd($keyword);
        if (!empty($keyword)) {
            $services = Service::where('service_name', 'LIKE', "%$keyword%")
                ->get();
            foreach($services as $ser){
                $ser['subcount'] = SubServices::select(DB::raw('COUNT(id) as totalsubs'))
                                ->where('sub_services.service_id','=',$ser->id)
                                ->first();
            }
            
            //prd($services->toArray());
        }else{
            $services = Service::get();
            foreach($services as $ser){
                $ser['subcount'] = SubServices::select(DB::raw('COUNT(id) as totalsubs'))
                                ->where('sub_services.service_id','=',$ser->id)
                                ->first();
            }
        }

        
        return view('admin.service.index',compact('services'));
    }

    public function search(Request $request)
    {
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $services = Service::where('service_name', 'LIKE', "%$keyword%")
                ->get();
            foreach($services as $ser){
                $ser['subcount'] = SubServices::select(DB::raw('COUNT(id) as totalsubs'))
                                ->where('sub_services.service_id','=',$ser->id)
                                ->first();
            }
            
        }else{
            $services = Service::get();
            foreach($services as $ser){
                $ser['subcount'] = SubServices::select(DB::raw('COUNT(id) as totalsubs'))
                                ->where('sub_services.service_id','=',$ser->id)
                                ->first();
            }
        }

       return json_encode($services);
    }

    public function viewSubServices($id)
    {

        $subservices = SubServices::with('services')->where('service_id','=',$id)->get();
        return view('admin.service.subservice.index',compact('subservices','id'));
    }

    public function subServiceSearch(Request $request,$id)
    {
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $subservices = SubServices::with('services')
                ->where('sub_service_name', 'LIKE', "%$keyword%")
                ->where('service_id','=',$id)
                ->get();
            
        }else{
            $subservices = SubServices::with('services')
                ->where('service_id','=',$id)
                ->get();
        }

       return json_encode($subservices);
    }

    public function create(){
        return view('admin.service.form');
    }

    public function createSubService($id){
        $services = Service::get();
        return view('admin.service.subservice.form',compact('id','services'));
    }

    public function store(Request $request){
        $data = $request->all();
        $check = Service::where('service_name','=',$data['service_name'])->where('service_code','=',$data['service_code'])->first();

        if(empty($check)){
        $picture = '';
            if ($request->hasFile('service_icon')) {
                
                $file = $request->file('service_icon');
                
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $size = $file->getClientSize();
                $MimeType = $file->getClientMimeType();

                $picture = uniqid(rand()).$filename;
                $destinationPath = public_path() . '/uploads/services/';
                $file->move($destinationPath, $picture);
                
            } 
           
            $service = Service::InsertService($data,$picture);
            if($service > 0){
                return redirect('admin/services')->with('message',"Service is added successfully.");
            }else{
                return redirect('admin/services')->with('message',"Something went wrong! Please try again after some time.");
            }
        }else{
            return redirect('admin/services')->with('meassage',"Something went wrong! Please try again after some time.");
        }

    }

    public function storeSubService(Request $request,$id){
        $data = $request->all();
        $subservice = new SubServices();
        $subservice->service_id = $id;
        $subservice->sub_service_name = $data['sub_service_name'];
        $subservice->unit_variable = $data['unit_variable'];
        $subservice->unit_price = $data['unit_price'];
        $subservice->unit_duration = $data['unit_duration'];
        $subservice->status = 1;
        $subservice->save();
        if($subservice){
            return redirect('admin/services')->with('message','Sub Service is added successfully!');
        }else{
            return redirect('admin/services')->with('message','Oops! Something went wrong while adding sub-service.');
        }
        
    }

    public function edit($id){
        $services = Service::findOrfail($id);
        return view('admin.service.edit',compact('services','id'));
    }

    public function updateservice(Request $request, $id){
        $data = $request->all();
        if(isset($id) && !empty($id) && !empty($data)){
            $check = Service::findOrfail($id);
            
            if(!empty($check)){
               
                $picture = '';

                if ($request->hasFile('service_icon')) {
                
                    if(!empty($check->service_icon)){
                        @unlink(fileurlservice().$check->service_icon);
                    }

                    $file = $request->file('service_icon');
                    
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $size = $file->getClientSize();
                    $MimeType = $file->getClientMimeType();
    
                    $picture = uniqid(rand()).$filename;
                    $destinationPath = public_path() . '/uploads/services/';
                    $file->move($destinationPath, $picture);
                    
                } else{
                    $picture = $check->service_icon;
                } 
                
                $update = Service::updateService($data,$id, $picture);
            }
           //print_r($update);die();
            if(isset($update) && !empty($update)){
                //return "1";
                return redirect('/admin/services')->with('message',"Service details updated successfully.");
            }else{
                return redirect('/admin/services')->with('message',"Something went wrong! Please try again after some time.");
            }
           }else{
                return redirect('/admin/services')->with('message',"Something went wrong! Please try again after some time.");
           }
    }

    public function changeStatus(Request $request){
        $data= $request->all();
        if($data['status'] == 1){
            $data1 = array(
                        'status'=> 1
                    );
        }else{
            $data1 = array(
                'status'=> 0
            );
        }
        $update = Service::where('id',$data['service_id'])->update($data1);
        //$update = SubServices::where('service_id',$data['service_id'])->update($data1);
        if(isset($update) && !empty($update)){
           return json_encode($update);
            
        }else{
            echo '0';
        }
    }

    

    public function editSubService($service_id,$id){
        $services = Service::get();
        $subservices = SubServices::findOrfail($id);
        return view('admin.service.subservice.edit',compact('subservices','service_id','id','services'));
    }

    public function updateSubService(Request $request,$service_id,$id){
       
        $data = $request->all();
        $insertdata = array(
        'service_id' => $service_id,
        'sub_service_name' => $data['sub_service_name'],
        'unit_variable' => $data['unit_variable'],
        'unit_price' => $data['unit_price'],
        'unit_duration' => $data['unit_duration']
        );
        
        $update = SubServices::where('id','=',$id)->update($insertdata);
        if($update){
            return redirect('admin/services/'.$service_id.'/subServices')->with('message','Sub Service is updated successfully!');
            //return json_encode($update);
        }else{
            return redirect('admin/services/'.$service_id.'/subServices')->with('message','Oops! Something went wrong while updating sub-service.');
            //return false;
        }
    }

    public function statusActive(Request $request){
        $data= $request->all();
        if($data['status'] == 1){
            $data1 = array(
                        'status'=> 1
                    );
        }else{
            $data1 = array(
                'status'=> 0
            );
        }
        $update = SubServices::where('id',$data['sub_service_id'])->update($data1);
        if(isset($update) && !empty($update)){
           return json_encode($update);
            
        }else{
            echo '0';
        }
    }

    public function destroy($id)
    {
        $deletedata = Service::destroy($id);
        $deletedata1 = SubServices::where('service_id',$id)->delete();
        if($deletedata){
            return redirect('admin/services')->with('message',"Service deleted successfully.");;
        }else{
            return redirect('admin/services')->with('message',"Something went wrong! Please try again after some time.");;
        }
        
    }

    public function destroySubService($id)
    {
        $deletedata = SubServices::destroy($id);
        if($deletedata){
            return redirect()->back();
        }else{
            return redirect('admin/services');
        }
        
    }

    public function othercharges()
    {
        $services = Service::where('status','=',1)->get();
        return view('admin.service.otherCharges',compact('services'));
    }

    public function chargeupdate(Request $request)
    {
        $data = $request->all();
        $id = $data['service_id'];

        $insertdata = array(
        'surveyer_price' => $data['surveyer_price']
        );
        
        $update = Service::where('id','=',$id)->update($insertdata);
        if($update){
            return redirect('admin/otherCharges');
        }else{
            return redirect('admin/otherCharges');
        }
    }
    
    
}
