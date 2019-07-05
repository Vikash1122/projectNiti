<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Auth;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::check()){
            $brands = Brand::get();
            return view('admin.brand.index',compact('brands'));
        }else{
            return redirect('/admin/login');
        }
    }

    public function search(Request $request)
    {
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $brands = Brand::where('brand_name', 'LIKE', "%$keyword%")
                ->get();   
        }else{
             $brands = Brand::get(); 
        }
       // print_r($categories); die;
       return json_encode($brands);
    }
    
    public function create(){
        return view('admin.brand.form');
    }
    public function store(Request $request){
        $data = $request->all();
        $check = Brand::where('brand_name','=',$data['brand_name'])->where('brand_code','=',$data['brand_code'])->first();
        if(empty($check)){
        $picture = '';
            if ($request->hasFile('brand_icon')) {
                
                $file = $request->file('brand_icon');
                
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $size = $file->getClientSize();
                $MimeType = $file->getClientMimeType();

                $picture = uniqid(rand()).$filename;
                $destinationPath = public_path() . '/uploads/brands/';
                $file->move($destinationPath, $picture);
                
            } 
           
            $service = Brand::InsertBrand($data,$picture);
           
            if($service > 0){
                return redirect('admin/brands')->with('message',"Brand is added successfully.");
            }else{
                return redirect('admin/brands')->with('message',"Something went wrong! Please try again after some time.");
            }
        }else{
            return redirect('admin/brands')->with('meassage',"Something went wrong! Please try again after some time.");
        }

    }

    public function edit($id){
        $brand = Brand::findOrfail($id);
        return view('admin.brand.edit',compact('brand','id'));
    }

    public function update(Request $request,$id){
        $data = $request->all();
        if(isset($id) && !empty($id) && !empty($data)){
            $check = Brand::findOrfail($id);
            
            if(!empty($check)){
               
                $picture = '';

                if ($request->hasFile('brand_icon')) {
                
                    if(!empty($check->brand_icon)){
                        @unlink(fileurlservice().$check->brand_icon);
                    }

                    $file = $request->file('brand_icon');
                    
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $size = $file->getClientSize();
                    $MimeType = $file->getClientMimeType();
    
                    $picture = uniqid(rand()).$filename;
                    $destinationPath = public_path() . '/uploads/brands/';
                    $file->move($destinationPath, $picture);
                    
                } else{
                    $picture = $check->brand_icon;
                } 
                
                $update = Brand::updateBrand($data, $id, $picture);
            }
           //print_r($update);die();
            if(isset($update) && !empty($update)){
                //return "1";
                return redirect('/admin/brands')->with('message',"Service details updated successfully.");
            }else{
                return redirect('/admin/brands')->with('message',"Something went wrong! Please try again after some time.");
            }
        }else{
            return redirect('/admin/brands')->with('message',"There is no update available.");
        }
    }
    public function destroy($id)
    {
        $deletedata = Brand::destroy($id);
        if($deletedata){
            return redirect('admin/brands')->with('message','Brand Record deleted Successfully!');
        }else{
            return redirect('admin/brands')->with('message','While Deleting Brand Record some error occured! Please try again after some time.');
        }
        
    }
}
