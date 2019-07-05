<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use App\Service;
use App\SubServices;
use App\ProductCat;
use App\VendorService;
use Auth;
use DB;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $vendors = Vendor::get();
        foreach($vendors as $vendor){
            $servc = VendorService::select(DB::raw("group_concat(DISTINCT vendor_services.service_id SEPARATOR ', ') as service_id"))
            ->where('vendor_id','=',$vendor->id)
            ->distinct()
            ->first();

            $vendor['service_id'] = explode(',',$servc->service_id);
            $arr = array();
            foreach($vendor['service_id'] as $sid){
                $services = Service::select('services.service_name')
                            ->where('id','=',$sid)
                            ->first();
                            array_push($arr,$services['service_name']);
            }
            $vendor['services'] = $arr;
            //$vendor['services'] = implode(', ',$arr);
        }
       
       // prd($vendors->toArray());die();
        $services = Service::where('status','=',1)->get();
        $subservices = SubServices::where('status','=',1)->get();
        $categories = ProductCat::where('status','=',1)->get();
        return view('admin.vendors.index',compact('vendors','services','subservices','categories'));

    }

    public function search(Request $request)
    {
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $vendors = Vendor::where('company_name', 'LIKE', "%$keyword%")
                ->get();
                foreach($vendors as $vendor){
                    $servc = VendorService::select(DB::raw("group_concat(DISTINCT vendor_services.service_id SEPARATOR ', ') as service_id"))
                    ->where('vendor_id','=',$vendor->id)
                    ->distinct()
                    ->first();
        
                    $vendor['service_id'] = explode(',',$servc->service_id);
                    $arr = array();
                    foreach($vendor['service_id'] as $sid){
                        $services = Service::select('services.service_name')
                                    ->where('id','=',$sid)
                                    ->first();
                                    array_push($arr,$services['service_name']);
                    }
                    $vendor['services'] = $arr;
                }
            
        }else{
            $vendors = Vendor::get();
            foreach($vendors as $vendor){
                $servc = VendorService::select(DB::raw("group_concat(DISTINCT vendor_services.service_id SEPARATOR ', ') as service_id"))
                ->where('vendor_id','=',$vendor->id)
                ->distinct()
                ->first();

                $vendor['service_id'] = explode(',',$servc->service_id);
                $arr = array();
                foreach($vendor['service_id'] as $sid){
                    $services = Service::select('services.service_name')
                                ->where('id','=',$sid)
                                ->first();
                                array_push($arr,$services['service_name']);
                }
                $vendor['services'] = $arr;
            }
        }

       return json_encode($vendors);
    }

    public function filterAjax(Request $request){
        $data = $request->all();
//prd($data);
        $orders = Vendor::getAllPaymentServiceFilter($data);
       
        if(isset($orders) && !empty($orders)){
           return json_encode($orders);
            
        }else{
            $orders = [];
            return json_encode($orders);
        }
    }


    public function create(){
        $services = Service::where('status','=',1)->get();
        $subservices = SubServices::where('status','=',1)->get();
        $categories = ProductCat::where('status','=',1)->get();
        return view('admin.vendors.form',compact('services','subservices','categories'));
    }

    public function store(Request $request){
        $data = $request->all();
        $check = Vendor::where('company_name','=',$data['company_name'])
                ->first();
        if(empty($check)){
        $picture = '';
            if ($request->hasFile('profile_img')) {
                
                $file = $request->file('profile_img');
                
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $size = $file->getClientSize();
                $MimeType = $file->getClientMimeType();

                $picture = uniqid(rand()).$filename;
                $destinationPath = public_path() . '/uploads/vendors/';
                $file->move($destinationPath, $picture);
                
            } 
        $company_logo = '';
            if ($request->hasFile('company_logo')) {
                
                $file = $request->file('company_logo');
                
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $size = $file->getClientSize();
                $MimeType = $file->getClientMimeType();

                $company_logo = uniqid(rand()).$filename;
                $destinationPath = public_path() . '/uploads/vendors/logo/';
                $file->move($destinationPath, $company_logo);
                
            } 
            $vendor = Vendor::insertVendor($request,$data,$picture,$company_logo);
            $sub_service_id = $data['sub_service_id'];
            foreach($data['service_id'] as $t=>$id){
            
                $cat = 'category_id_'.$t ;
            
                if(isset($request->$cat) && !empty($request->$cat)){
                    $category_id = array_filter($request->$cat) ;
                    foreach($category_id as $k=>$data){
    
                        $all = array(
                        'vendor_id' => $vendor,
                        'service_id'=>$id,
                        'sub_service_id' => $sub_service_id[$t] ,
                        'category_id' => $data 
                        );
                        $insertdata = \DB::table('vendor_services')->insert($all);
                    }
                }else{
                    $all = array(
                    'vendor_id' => $vendor,
                    'service_id'=>$id,
                    'sub_service_id' => $sub_service_id[$t] ,
                    'category_id' => NULL 
                    );
                    $insertdata = \DB::table('vendor_services')->insert($all);
                }
                
                
            } 
    
            if(($vendor > 0) && ($insertdata)){
                return redirect('admin/vendors')->with('message',"Vendor is registered successfully.");
            }else{
                return redirect('admin/vendors')->with('message',"Something went wrong! Please try again after some time.");
            }
            // if(($vendor > 0) && ($insertdata)){
            //     return json_encode($vendor);
            // }else{
            //     return 0;
            // }
        }else{
            return redirect('admin/vendors')->with('message',"This Vendor is already exist! Please try again with different company name.");
            //return 0;
        }
    }

    public function show($id){
        $services = Service::where('status','=',1)->get();
        $subservices = SubServices::where('status','=',1)->get();
        $categories = ProductCat::where('status','=',1)->get();
        return view('admin.vendors.show',compact('services','subservices','categories'));
    }

    public function edit($id){
        $services = Service::where('status','=',1)->get();
        $subservices = SubServices::where('status','=',1)->get();
        $categories = ProductCat::where('status','=',1)->get();

        $vendor = Vendor::findOrfail($id);
        $servc = VendorService::select('service_id','sub_service_id')
                ->where('vendor_id','=',$id)
                ->groupBy('sub_service_id')
                ->distinct()
                ->get();
                $arr = array();
        foreach($servc as $svc){
            $dt = VendorService::select('id','service_id','sub_service_id',DB::raw("group_concat(DISTINCT category_id SEPARATOR ', ') as category_id"))
                                ->where('service_id',$svc->service_id)
                                ->where('sub_service_id',$svc->sub_service_id)
                                ->groupBy('sub_service_id')
                                ->first();

                                array_push($arr,$dt);
        }
       
        $vendor['selected_services'] = $arr;
       // prd($vendor->toArray());die();
        return view('admin.vendors.edit',compact('services','subservices','categories','vendor','id'));
    }

    public function update(Request $request, $id){
        $data = $request->all();
        //prd($data);
        $vendor = Vendor::findOrfail($id);
        if(isset($vendor) && !empty($vendor)){
            $picture = '';
            if ($request->hasFile('profile_img')) {
                
                $file = $request->file('profile_img');
                
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $size = $file->getClientSize();
                $MimeType = $file->getClientMimeType();

                $picture = uniqid(rand()).$filename;
                $destinationPath = public_path() . '/uploads/vendors/';
                $file->move($destinationPath, $picture);
                
            }else{
                $picture = $vendor->profile_img;
            } 

            $company_logo = '';
            if ($request->hasFile('company_logo')) {
                
                $file = $request->file('company_logo');
                
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $size = $file->getClientSize();
                $MimeType = $file->getClientMimeType();

                $company_logo = uniqid(rand()).$filename;
                $destinationPath = public_path() . '/uploads/vendors/logo/';
                $file->move($destinationPath, $company_logo);
                
            }else{
                $company_logo = $vendor->company_logo;
            }
            $update = Vendor::UpdateVendor($request,$data,$picture,$company_logo,$id);
            $sub_service_id = $data['sub_service_id'];

            $deletesubdata = VendorService::where('vendor_id',$id)->delete();
            
                foreach($data['service_id'] as $t=>$sid){
            
                    $cat = 'category_id_'.$t ;
                    
                    if(isset($request->$cat) && !empty($request->$cat)){
                        $category_id = array_filter($request->$cat) ;
                        
                        foreach($category_id as $k=>$data){
        
                            $all = array(
                            'vendor_id' => $id,
                            'service_id'=>$sid,
                            'sub_service_id' => $sub_service_id[$t] ,
                            'category_id' => $data 
                            );
                            $insertdata = \DB::table('vendor_services')->insert($all);
                        }
                    }else{
                        $all = array(
                        'vendor_id' => $id,
                        'service_id'=>$sid,
                        'sub_service_id' => $sub_service_id[$t] ,
                        'category_id' => NULL 
                        );
                        $insertdata = \DB::table('vendor_services')->insert($all);
                    } 
                }
            
            if(($update) && ($insertdata)){
                return redirect('admin/vendors')->with('message',"Vendor is Updated successfully.");
            }else{
                return redirect('admin/vendors')->with('message',"Something went wrong! Please try again after some time.");
            }
        }else{
            return redirect('admin/vendors')->with('message',"Something went wrong! Please try again after some time.");
        }
    }

    public function destroyServices($id){
        $deletedata = VendorService::where('id',$id)->delete();
        if($deletedata){
            return redirect()->back()->with('message',"Vendor Service Details deleted successfully.");;
        }else{
            return redirect('admin/vendors')->with('message',"Something went wrong! Please try again after some time.");;
        }
    }

    public function destroy($id){
        $deletedata = Vendor::destroy($id);
        $deletedata1 = VendorService::where('vendor_id',$id)->delete();
        if($deletedata){
            return redirect('admin/vendors')->with('message',"Vendor deleted successfully.");;
        }else{
            return redirect('admin/vendors')->with('message',"Something went wrong! Please try again after some time.");;
        }
    }
}
