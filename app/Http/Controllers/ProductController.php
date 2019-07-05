<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\ProductCat;
use App\Brand;
use App\Product;
use App\ProductBrand;
use App\Order;
use App\SubServices;
use Auth;
use DB;
use App\Vendor;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $keyword = '';
        $services = Service::where('status','=',1)->get();
        $products = Product::getProducts($keyword);
        $brands = Brand::get();
        return view('admin.products.index',compact('products','brands','services'));
    }

    public function search(Request $request)
    {
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $products = Product::getProducts($keyword);
            
        }else{
            $products = Product::getProducts($keyword);
           
        }

       return json_encode($products);
    }

    public function filterByAjax(Request $request){
        $data = $request->all();
        $products = Product::getAllFilter($data);
       //prd($products);
        if(isset($products) && !empty($products)){
           return json_encode($products);
            
        }else{
            $products = [];
            return json_encode($products);
        }
    }

    public function create(){
        $services = Service::where('status','=',1)->get();
        $subservices = SubServices::where('status','=',1)->get();
        $categories = ProductCat::where('status','=',1)->get();
        $brands = Brand::get();
        $products = Product::get();
        $vendors = Vendor::select('id','company_name')->get();
        //prd($vendors->toArray());
        return view('admin.products.form',compact('services','subservices','categories','brands','products','vendors'));
    }

    public function store(Request $request){
        $data = $request->all();
        $check = Product::where('product_name','=',$data['product_name'])
                ->where('product_code','=',$data['product_code'])
                ->first();
        if(empty($check)){
        $picture = '';
            if ($request->hasFile('product_img')) {
                
                $file = $request->file('product_img');
                
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $size = $file->getClientSize();
                $MimeType = $file->getClientMimeType();

                $picture = uniqid(rand()).$filename;
                $destinationPath = public_path() . '/uploads/products/';
                $file->move($destinationPath, $picture);
                
            } 
           
            $product = Product::insertProduct($request,$data,$picture);
            if($product > 0){
                return redirect('admin/inventry/products')->with('message',"Product is added successfully.");
            }else{
                return redirect('admin/inventry/products')->with('message',"Something went wrong! Please try again after some time.");
            }
        }else{
            return redirect('admin/inventry/products')->with('meassage',"Something went wrong! Please try again after some time.");
        }

    }

    public function edit($id){
        $services = Service::where('status','=',1)->get();
        $subservices = SubServices::where('status','=',1)->get();
        $categories = ProductCat::where('status','=',1)->get();
        $brands = Brand::get();
        $products = Product::with('brands')->where('products.id',$id)->first();
        $vendors = Vendor::select('id','company_name')->get();
        return view('admin.products.edit',compact('id','services','subservices','categories','brands','products','vendors'));
    }

    public function update(Request $request,$id){
        $data = $request->all();
        if(isset($data) && !empty($data)){
            $check = Product::findOrfail($id);
            $picture = '';
                if ($request->hasFile('product_img')) {
                    
                    if(!empty($check->product_img)){
                        @unlink(fileurlProduct().$check->product_img);
                    }

                    $file = $request->file('product_img');
                    
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $size = $file->getClientSize();
                    $MimeType = $file->getClientMimeType();
    
                    $picture = uniqid(rand()).$filename;
                    $destinationPath = public_path() . '/uploads/products/';
                    $file->move($destinationPath, $picture);
                    
                }else{
                    $picture = $check->product_img;
                } 
               
                $update = Product::updateProduct($request,$data,$picture,$id);
                if(isset($update) && !empty($update)){
                    return redirect('admin/inventry/products')->with('message',"Product is updated successfully.");
                }else{
                    return redirect('admin/inventry/products')->with('message',"Something went wrong! Please try again after some time.");
                }
            }else{
                return redirect('admin/inventry/products')->with('meassage',"Something went wrong! Please try again after some time.");
            }

    }

    public function show($id){
        $services = Service::where('status','=',1)->get();
        $brands = Brand::get();
        $products = Product::with('brands')->where('products.id',$id)->first();
        foreach($products->brands as $bnd){
            $brand_name = Brand::select('brand_name')->where('id',$bnd->brand_id)->first();
            $bnd['brand_name'] = $brand_name->brand_name;
        }
        return view('admin.products.show',compact('services','brands','products'));
    }

    public function destroy($id)
    {
        $deletedata = Product::destroy($id);
        $deletedata1 = ProductBrand::where('product_id',$id)->delete();
        if($deletedata && $deletedata1){
            return redirect('admin/inventry/products')->with('message',"Product deleted successfully.");;
        }else{
            return redirect('admin/inventry/products')->with('message',"Something went wrong! Please try again after some time.");;
        }
        
    }
    
    

    public function getajaxProductddata(Request $request){
        $data = $request->all();
        $prducts =DB::table("products")
                    ->where("service_id",$data['service_id'])
                    ->select("product_name","id")->get();
      
        return json_encode($prducts);
    }

    public function issueProduct($id){
        $services = Service::where('status','=',1)->get();
        $brands = Brand::get();
        $products = Product::get();
        $jobs = Order::getnotAssignProduct($id);
        return view('admin.products.issueProduct',compact('services','brands','products','jobs','id'));
    }

    public function getajaxProductdata(Request $request){
        $data = $request->all();
        $ids =DB::table("product_brands")
                    ->where("product_id",$data['product_id'])
                    ->select("brand_id")->get();
        $brands = array();
        foreach($ids as $id){
        $arr =DB::table("brands")
            ->where("id",$id->brand_id)
            ->select("brand_name","id")->first();
            array_push($brands,$arr);
        }
        return json_encode($brands);
    }

    public function getajaxCatdata(Request $request){
        $data = $request->all();
        $categories =DB::table("product_cats")
                    ->where("sub_service_id",$data['subservice_id'])
                    ->select("name","id")->get();
      
        return json_encode($categories);
    }

    public function addissueProduct(Request $request,$id){

        $data = $request->all();
        $brands = Brand::get();
        $products = Product::get();
            $dt = array(
                'employee_id'=>$data['employee_id'],
                'status'=>2
            );
            $updatedata = DB::table('issue_products')->where('job_id','=',$id)->update($dt);
            
        if($updatedata){
            return redirect('admin/inventry/products/issueProducts')->with('message',"Product assign successfully.");
        }else{
            return redirect('admin/inventry/products/issueProducts')->with('message',"Something went wrong! Please try again after some time.");
        }
    }



    /**
     * Service Team Panel work start
     */
    public function listJobs(){
        $data ='';
        $services = Service::where('status','=',1)->get();
        $brands = Brand::get();
        $products = Product::get();
        $currentmonthjob = Order::viewallJobsDate();
        $st = 4;
        $alljobs = Order::getAllAllotedcurrent($st);
        return view('admin.products.listJobs',compact('services','brands','products','currentmonthjob','alljobs'));
    }

    public function listDates(Request $request){
        $data = $request->all();
        $dt = $data['date'];
        $currentmonthjob = Order::viewallJobsDate($dt);
        if($currentmonthjob){
            return $currentmonthjob;
        }else{
            return 0;
        }
    }

    public function ajaxAllotedDateJobs(Request $request){
        $data = $request->all();
        $dt = $data['date'];
        $currentmonthjob = Order::viewallallotedJobsDate($dt);
        if($currentmonthjob){
            return $currentmonthjob;
        }else{
            return 0;
        }
    }

    public function getAllJobAjax(Request $request){
        $data = $request->all();

        $alljobs = Order::getAllAllotedbyDate($data);
        if(isset($alljobs) && !empty($alljobs)){
           return json_encode($alljobs);
            
        }else{
            return json_encode($alljobs);
        }
    }

    public function requestInventory($id){
        $services = Service::where('status','=',1)->get();
        $brands = Brand::get();
        $products = Product::get();
        $jobs = Order::getnotAssignProduct($id);
        return view('admin.products.requestInventory',compact('services','brands','products','jobs','id'));
    }

    public function addrequestedProduct(Request $request,$id){

        $data = $request->all();
        $brands = Brand::get();
        $products = Product::get();
        foreach($data['service_id'] as $k=>$service){
            $dt = array(
                'job_id'=>$id,
                'group_id'=>$data['group_id'],
                'service_id'=>$service,
                'product_id'=>$data['product_id'][$k],
                'brand_id'=>$data['brand_id'][$k],
                'qty'=>$data['qty'][$k],
                'specification'=>$data['specification'][$k],
                'status'=>1
            );
            $insertdata = DB::table('issue_products')->insert($dt);
            
        }

        if($insertdata > 0){
            return redirect('admin/inventry/products/issueProducts')->with('message',"Request for inventory products placed successfully.");
        }else{
            return redirect('admin/inventry/products/issueProducts')->with('message',"Something went wrong! Please try again after some time.");
        }
    }

    /**
     * Service Team Panel work end
     */
}
