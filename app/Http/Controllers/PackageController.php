<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\PackageService;
use App\PackageCategory;
use Auth;
use DB;

class PackageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $packages = Package::with('packcat')->get();
        foreach($packages as $pack){
            foreach($pack['packcat'] as $cat){
                $pc = PackageService::where('package_cat_id','=',$cat->id)->get();
               
                $cat['pc']= $pc;
            }
        }
       
        return view('admin.package.index',compact('packages'));
    }

    public function create(){
        $packages = Package::get();
        $cat = DB::table('package_category')->get();
        return view('admin.package.form',compact('packages','cat'));
    }

    public function allContracts(){
        $packages = Package::get();
        return view('admin.package.contract.index',compact('packages'));
    }

    public function createPackage(){
        $packages = Package::get();
        $cat = DB::table('package_category')->get();
        return view('admin.package.contract.addPackage',compact('packages','cat'));
    }

    public function editContract($id){
        $package = Package::findOrfail($id);
        return view('admin.package.contract.editContract',compact('package','id'));
    }

    public function updateContract(Request $request, $id){
        $data = $request->all();
        if(isset($id) && !empty($id) && !empty($data)){
            $check = Package::findOrfail($id);
            if(!empty($check)){
                $update = Package::updateContract($data,$id);
            }

            if(isset($update) && !empty($update)){
                return redirect('/admin/contracts/contractList')->with('message',"Contract details updated successfully.");
            }else{
                return redirect('/admin/contracts/contractList')->with('message',"Something went wrong! Please try again after some time.");
            }
           }else{
                return redirect('/admin/contracts/contractList')->with('message',"Something went wrong! Please try again after some time.");
           }
    }

    public function listCategory(){
        $categories = DB::table('package_category')
                        ->select('package_category.*','packages.package_type')
                        ->leftjoin('packages','packages.id','=','package_category.package_id')
                        ->get();
        return view('admin.package.category.index',compact('categories'));
    }

    public function createCategory(){
        $packages = Package::get();
        return view('admin.package.category.addCategory',compact('packages'));
    }

    public function editCategory($id){
        $category = DB::table('package_category')->where('id',$id)->first();
        $packages = Package::get();
        return view('admin.package.category.editCategory',compact('category','packages','id'));
    }

    public function getajaxpackagedata(Request $request){
        $data = $request->all();
        $categories =DB::table("package_category")
                    ->where("package_id",$data['package_id'])
                    ->select("title","id")->get();
        return json_encode($categories);
    }

    public function store(Request $request){
        $data = $request->all();
        $pkg_service_name = $data['pkg_service_name'];
        $pkg_service_desc = $data['pkg_service_desc'];
        $cat_id = $data['package_cat_id'];
        $package_id = $data['package_id'];
      
            foreach($pkg_service_name as $k=>$ser)
            {
                $packagedata = array(
                    'package_id' =>$package_id,
                    'package_cat_id' =>$cat_id,
                    'pkg_service_name' => $ser,
                    'pkg_service_desc' => $pkg_service_desc[$k]
                );
                
                $tbdata = DB::table('package_services')->insert($packagedata);
                
            }
            if(isset($tbdata) && !empty($tbdata)){
                return redirect('admin/contracts')->with('message',"Package is added successfully.");
            }else{
                return redirect('admin/contracts')->with('message',"Something went wrong! Please try again after some time.");
            }
       
    }

    public function storeCategory(Request $request){
        $data = $request->all();
        $title = $data['title'];
        foreach($title as $tt){
            $check = PackageCategory::where('title','=',$tt)->where('package_id','=',$data['package_id'])->first();
            
        }
        if($check == ''){
        foreach($title as $t){
                $catdata[] = array(
                    'package_id' =>$data['package_id'],
                    'title' => $t
                );
               
        }
        
        $package = DB::table('package_category')->insert($catdata);
            if($package > 0){
                return redirect('admin/contracts/addContractCategory')->with('message',"Package Category is added successfully.");
            }else{
                return redirect('admin/contracts/addContractCategory')->with('message',"This package category is already exists! Please try again with different package category name!");
            }
        }else{
                return redirect('admin/contracts/addContractCategory')->with('message',"Something went wrong! Please try again after some time.");
            }
       
    }

    public function updateCategory(Request $request,$id){
        $data = $request->all();
        $title = $data['title'];
        if(isset($data) && !empty($data)){
            $dt = array(
                'package_id'=>$data['package_id'],
                'title'=>$data['title']
            );
        
            $update = DB::table('package_category')->where('id',$id)->update($dt);
            if($update > 0){
                return redirect('admin/contracts/listContractCategory')->with('message',"Package Category is updated successfully.");
            }else{
                return redirect('admin/contracts/listContractCategory')->with('message',"Something went wrong! Please try again after some time.");
            }
        }else{
                return redirect('admin/contracts/listContractCategory')->with('message',"Something went wrong! Please try again after some time.");
        }
       
    }
    public function storePackage(Request $request){
        $data = $request->all();
        $check = Package::where('package_type','=',$data['package_type'])->first();
        if($check == ''){
            $package = Package::InsertPackage($data);
        }

            if(isset($package) && !empty($package)){
                return redirect('admin/contracts/addContract')->with('message',"Package is added successfully.");
            }else{
                return redirect('admin/contracts/addContract')->with('message',"This package is already exists! Please try again with different package type!");
            }
       
    }

    public function edit($id){

        $category = PackageCategory::select('id','title')->where('package_id',$id)->get();
        $package = Package::with('packcat')->where('id',$id)->first();

        foreach($package['packcat'] as $cat){
            $pc = PackageService::where('package_cat_id','=',$cat->id)->get();
            
            $cat['pc']= $pc;
        }

        return view('admin.package.edit',compact('id','package','category'));

    }

    public function update(Request $request, $id){
        $data = $request->all();
        $package_id = $data['package_id'];

        if(isset($data) && !empty($data)){
            $package = PackageService::where('package_id',$id)->delete();

            foreach($data['package_cat_id'] as $cid){
                $serv = 'pkg_service_name_'.$cid ;
                $desc = 'pkg_service_desc_'.$cid ;
            
                $service_name = array_filter($request->$serv) ;
                $package_description = array_filter($request->$desc) ;
                $myarray= array();
                foreach($service_name as $k=>$st){

                    $all = array(
                    'package_id' =>$id,
                    'package_cat_id' =>$cid,
                    'pkg_service_name' => isset($st) ? $st : NULL,
                    'pkg_service_desc' => isset($package_description[$k]) ? $package_description[$k] : NULL
                );
                    array_push($myarray,$all);

                }
                $tbdata = DB::table('package_services')->insert($myarray);
                
            }
            
            
        }
        
        if(isset($tbdata) && !empty($tbdata)){
            return redirect('admin/contracts')->with('message',"Package is updated successfully.");
        }else{
            return redirect('admin/contracts')->with('message',"Something went wrong! Please try again after some time.");
        }
       
    }


    public function destroyContract($id){
        $deletedata = Package::destroy($id);
        if($deletedata){
            return redirect()->back()->with('message','Contract Deleted Successfully!');
        }else{
            return redirect('/admin/contracts/contractList')->with('message','Oops! There is something went wrong. Please Try again after some time.');
        }
    }

    public function delete($id){
        $deletedata = PackageCategory::destroy($id);
        if($deletedata){
            return redirect()->back()->with('message','Contract Category Deleted Successfully!');
        }else{
            return redirect('/admin/contracts/contractList')->with('message','Oops! There is something went wrong. Please Try again after some time.');
        }
    }

    public function destroy($id){
        $deletedata = Package::destroy($id);
        $categorydeletedata = PackageCategory::where('package_id',$id)->delete();
        $packagedelete = PackageService::where('package_id',$id)->delete();
        if($deletedata){
            return redirect()->back()->with('message','Contract Deleted Successfully!');
        }else{
            return redirect('/admin/contracts')->with('message','Oops! There is something went wrong. Please Try again after some time.');
        }
    }

    public function deleteContactServices($id){
        $packageserviceDel = PackageService::where('id',$id)->delete();
        if($packageserviceDel){
            return redirect()->back()->with('message','Contract Services Deleted Successfully!');
        }else{
            return redirect('/admin/contracts')->with('message','Oops! There is something went wrong. Please Try again after some time.');
        }
    }
    
}
