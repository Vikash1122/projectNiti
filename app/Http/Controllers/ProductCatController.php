<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCat;
use App\Service;
use App\SubServices;
use Auth;

class ProductCatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $categories = ProductCat::get();
        
        return view('admin.categories.index',compact('categories'));
    }

    public function search(Request $request)
    {
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $categories = ProductCat::where('name', 'LIKE', "%$keyword%")
                ->get();   
        }else{
             $categories = ProductCat::get(); 
        }
       // print_r($categories); die;
       return json_encode($categories);
    }

    public function create(){
        $services = Service::where('status','=',1)->get();
        $subservices = SubServices::where('status','=',1)->get();
        return view('admin.categories.form',compact('services','subservices'));
    }
    public function store(Request $request){
        $data = $request->all();
        $check = ProductCat::where('name','=',$data['name'])
                ->where('code','=',$data['code'])
                ->first();
        if(empty($check)){
        $picture = '';
            if ($request->hasFile('brand_icon')) {
                
                $file = $request->file('brand_icon');
                
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $size = $file->getClientSize();
                $MimeType = $file->getClientMimeType();

                $picture = uniqid(rand()).$filename;
                $destinationPath = public_path() . '/uploads/categories/';
                $file->move($destinationPath, $picture);
                
            } 
           
            $service = ProductCat::InsertCategory($data,$picture);
            if($service > 0){
                return redirect('admin/categories')->with('message',"Category is added successfully.");
            }else{
                return redirect('admin/categories')->with('message',"Something went wrong! Please try again after some time.");
            }
        }else{
            return redirect('admin/categories')->with('meassage',"Something went wrong! Please try again after some time.");
        }

    }

    public function edit($id){
        $services = Service::where('status','=',1)->get();
        $subservices = SubServices::where('status','=',1)->get();
        $category = ProductCat::findOrfail($id);
        return view('admin.categories.edit',compact('id','category','services','subservices'));
    }

    public function update(Request $request,$id){
        $data = $request->all();
        if(isset($id) && !empty($id) && !empty($data)){
            $check = ProductCat::findOrfail($id);
            
            if(!empty($check)){
               
                $picture = '';

                if ($request->hasFile('brand_icon')) {
                
                    if(!empty($check->cat_img)){
                        @unlink(fileurlservice().$check->cat_img);
                    }

                    $file = $request->file('brand_icon');
                    
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $size = $file->getClientSize();
                    $MimeType = $file->getClientMimeType();
    
                    $picture = uniqid(rand()).$filename;
                    $destinationPath = public_path() . '/uploads/categories/';
                    $file->move($destinationPath, $picture);
                    
                } else{
                    $picture = $check->cat_img;
                } 
                
                $update = ProductCat::updateCategory($data,$id, $picture);
            }
           //print_r($update);die();
            if(isset($update) && !empty($update)){
                //return "1";
                return redirect('/admin/categories')->with('message',"Category details updated successfully.");
            }else{
                return redirect('/admin/categories')->with('message',"Something went wrong! Please try again after some time.");
            }
        }else{
            return redirect('/admin/categories')->with('message',"There is no changes available to update.");
        }
    }
    public function isActive(Request $request){
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
        $update = ProductCat::where('id',$data['cat_id'])->update($data1);
        if(isset($update) && !empty($update)){
           return json_encode($update);
            
        }else{
            echo '0';
        }
    }

    public function destroy($id)
    {
        $deletedata = ProductCat::destroy($id);
        if($deletedata){
            return redirect('admin/categories')->with('message','Category Record deleted Successfully!');
        }else{
            return redirect('admin/categories')->with('message','While Deleting Category Record some error occured! Please try again after some time.');
        }
        
    }

    public function getajaxSubServicedata(Request $request){
        $data = $request->all();
        $subservices =SubServices::where("service_id",$data['service_id'])
                    ->select("sub_service_name","id")->get();
        
        return json_encode($subservices);
    }
}
