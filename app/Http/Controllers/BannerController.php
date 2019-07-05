<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use Auth;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if (Auth::check()){
            $banners = Banner::get();
            $instant_banners = Banner::where('activate_type','=',0)->get();
            $schedule_banners = Banner::where('activate_type','=',1)->get();
            //prd($schedule_banners->toArray());
            return view('admin.banner.index',compact('banners','instant_banners','schedule_banners'));
        }else{
            return redirect('/admin/login');
        }

    }

    public function create(){
        
        return view('admin.banner.form');
    }

    public function store(Request $request){
        $data = $request->all();
       // $check = Service::where('title','=',$data['title'])->where('service_code','=',$data['service_code'])->first();

       // if(empty($check)){
        $picture = '';
            if ($request->hasFile('banner_img')) {
                
                $file = $request->file('banner_img');
                
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $size = $file->getClientSize();
                $MimeType = $file->getClientMimeType();

                $picture = uniqid(rand()).$filename;
                $destinationPath = public_path() . '/uploads/banners/';
                $file->move($destinationPath, $picture);
                
            } 
            $service = Banner::InsertBanner($data,$picture);
            if($service > 0){
                return redirect('admin/banners')->with('message',"Banner is added successfully.");
            }else{
                return redirect('admin/banners')->with('message',"Something went wrong! Please try again after some time.");
            }
        // }else{
        //     return redirect('admin/services')->with('meassage',"Something went wrong! Please try again after some time.");
        // }

    }

    public function edit($id){
        $banner = Banner::findOrfail($id);
        return view('admin.banner.edit',compact('id','banner'));
    }

    public function updateservice(Request $request,$id){
        $data = $request->all();
      
        if(isset($id) && !empty($id) && !empty($data)){
            $check = Banner::findOrfail($id);
            
            if(!empty($check)){
                
                $picture = '';

                if ($request->hasFile('banner_img')) {
                
                    if(!empty($check->banner_img)){
                        @unlink(fileurlservice().$check->banner_img);
                    }

                    $file = $request->file('banner_img');
                    
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $size = $file->getClientSize();
                    $MimeType = $file->getClientMimeType();
    
                    $picture = uniqid(rand()).$filename;
                    $destinationPath = public_path() . '/uploads/banners/';
                    $file->move($destinationPath, $picture);
                    
                } else{
                    $picture = $check->banner_img;
                } 
                
                $update = Banner::updateBanner($data,$id, $picture);
            }
            if(isset($update) && !empty($update)){
                return redirect('admin/banners')->with('message',"Banner record updated successfully.");
             
           }else{
                return redirect('/admin/banners')->with('message',"Something went wrong! Please try again after some time.");
           }
        }
    }

    public function destroy($id)
    {
        $deletedata = Banner::destroy($id);
        if($deletedata){
            return redirect('admin/banners')->with('message',"Banner record deleted successfully.");
        }else{
            return redirect('admin/banners')->with('message',"Something went wrong! While deleting Banner Record.");
        }
        
    }
}
