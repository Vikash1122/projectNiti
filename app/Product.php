<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use DB;
use App\ProductBrand;
use App\Brand;
use App\Service;

class Product extends Model
{

    use LogsActivity;

    /**
     * Change activity log event description
     *
     * @param string $eventName
     *
     * @return string
     */
    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }
    
    public function brands()
    {
       return $this->hasMany(ProductBrand::class);
    }

    public static function insertProduct($request,$data,$picture){
        $brands = implode(',',$data['brand_id']);
        if ($request->has('another_servId')) {
        $another_servId = implode(',',$data['another_servId']);
        }else{
            $another_servId = '';
        }
        $insert = new Product();
        $insert->service_id = (isset($data['service_id'])) ? $data['service_id'] : NULL;
        $insert->sub_service_id = (isset($data['sub_service_id'])) ? $data['sub_service_id'] : NULL;
        $insert->category_id = (isset($data['category_id'])) ? $data['category_id'] : NULL;
        $insert->product_name = (isset($data['product_name'])) ? $data['product_name'] : NULL;
        $insert->product_code = (isset($data['product_code'])) ? $data['product_code'] : NULL;
        $insert->product_img = (isset($picture)) ? $picture: NULL;
        $insert->brand_id = (isset($brands)) ? $brands : NULL;
        $insert->another_servId = (isset($another_servId)) ? $another_servId : NULL;
        $insert->text_content = (isset($data['text_content'])) ? $data['text_content'] : NULL;
        $insert->status = 1;
        $save = $insert->save();
        $insert_id = $insert->id;

            if($insert_id){
                foreach($data['brand_id'] as $k=>$brand){
                    $dt = array(
                        'product_id'=>$insert_id,
                        'brand_id'=>$brand,
                        'qty'=>$data['qty'][$k],
                        'price'=>$data['price'][$k],
                        'availability_days'=>$data['availability_days'][$k],
                        'vendor_id'=>$data['vendor_id'][$k]
                    );
                    $insertdata = DB::table('product_brands')->insert($dt);
                   
                }
                 
            }
        if ($save && $insertdata) {
            return $insert_id;
        }else{
            return false;
        }
    }

    public static function updateProduct($request,$data,$picture,$id){
        $brands = implode(',',$data['brand_id']);
        if ($request->has('another_servId')) {
            $another_servId = implode(',',$data['another_servId']);
        }else{
            $another_servId = '';
        }
       // $another_servId = implode(',',$data['another_servId']);
        
        $update = static::where('id', $id)->first();
        $update->service_id = (isset($data['service_id'])) ? $data['service_id'] : NULL;
        $update->sub_service_id = (isset($data['sub_service_id'])) ? $data['sub_service_id'] : NULL;
        $update->category_id = (isset($data['category_id'])) ? $data['category_id'] : NULL;
        $update->product_name = (isset($data['product_name'])) ? $data['product_name'] : NULL;
        $update->product_code = (isset($data['product_code'])) ? $data['product_code'] : NULL;
        $update->product_img = (isset($picture)) ? $picture: NULL;
        $update->brand_id = (isset($brands)) ? $brands : NULL;
        $update->another_servId = (isset($another_servId)) ? $another_servId : NULL;
        $update->text_content = (isset($data['text_content'])) ? $data['text_content'] : NULL;
        $update->status = 1;
        $save = $update->save();
        if($id){
            $deletedata = DB::table('product_brands')->where('product_id',$id)->delete();

            foreach($data['brand_id'] as $k=>$brand){
                $dt = array(
                    'product_id'=>$id,
                    'brand_id'=>$brand,
                    'qty'=>$data['qty'][$k],
                    'price'=>$data['price'][$k],
                    'availability_days'=>$data['availability_days'][$k],
                    'vendor_id'=>$data['vendor_id'][$k]
                );
                $insertdata = DB::table('product_brands')->insert($dt);
                
            }
                
        }
        if ($save && $insertdata) {
            return $update;
        }else{
            return false;
        }
    }

    public static function getProducts($keyword){
        if(isset($keyword) && !empty($keyword)){
            $data = static::select('products.*','services.service_name')
                    ->leftjoin('services','services.id','=','products.service_id')
                    ->where('products.product_name', 'LIKE', "%$keyword%")->get();
        }else{
            $data = static::select('products.*','services.service_name')
                    ->leftjoin('services','services.id','=','products.service_id')->get();
        }
        foreach($data as $d){
            $brand_id = explode(',',$d->brand_id);
            $service_id = explode(',',$d->another_servId);

            $qty = ProductBrand::select(\DB::raw("(GROUP_CONCAT(DISTINCT qty SEPARATOR ',')) as 'qty' "))->where('product_id',$d->id)->first();
            $totalqty = explode(',',$qty->qty);
            $d['qty'] = array_sum($totalqty);
            $brands = Brand::select(\DB::raw("(GROUP_CONCAT(DISTINCT brand_name SEPARATOR ',')) as 'brand_name' "))
                            ->whereIn('id',$brand_id)->first();
            $d['brands'] = $brands->brand_name;
            $services = Service::select(\DB::raw("(GROUP_CONCAT(DISTINCT service_name SEPARATOR ',')) as 'services' "))
                            ->whereIn('id',$service_id)->first();
            $d['services'] = $services->services;

        }
        
        if(isset($data) && !empty($data)){
            return $data;
        }else{
            return false;
        }
    }

    public static function getAllFilter($data){

        $brand_name= $data['brand_name'];
        $stock_type = $data['stock_type'];
        $service_type = $data['service_type'];
        $myarray = array();
        
        if($brand_name == '' && $stock_type == ''){
            $products = static::select('products.*','services.service_name')
                ->leftjoin('services','services.id','=','products.service_id')
                ->where('products.service_id','=',$service_type)
                ->get();

                foreach($products as $p){
                    $brand_id = explode(',',$p->brand_id);
                    $service_id = explode(',',$p->another_servId);
    
                    $qty = ProductBrand::select(\DB::raw("(GROUP_CONCAT(DISTINCT qty SEPARATOR ',')) as 'qty' "))->where('product_id',$p->id)->first();
                    $totalqty = explode(',',$qty->qty);
                    $p['qty'] = array_sum($totalqty);
                    $brands = Brand::select(\DB::raw("(GROUP_CONCAT(DISTINCT brand_name SEPARATOR ',')) as 'brand_name' "))
                                    ->whereIn('id',$brand_id)->first();
                    $p['brands'] = $brands->brand_name;
                    $services = Service::select(\DB::raw("(GROUP_CONCAT(DISTINCT service_name SEPARATOR ',')) as 'services' "))
                                    ->whereIn('id',$service_id)->first();
                    $p['services'] = $services->services;
                }
            // $arr = array();
            // foreach($service_type as $stp){
            //     $products = static::select('products.*','services.service_name')
            //     ->leftjoin('services','services.id','=','products.service_id')
            //     ->where('service_id','=',$stp)
            //     ->get();
            //     if(isset($products) && !empty($products)){
            //         array_push($arr,$products);
            //     }
                
            // }
          

            // foreach($arr as $aa){
            //     foreach($aa as $a){
            //         $brand_id = explode(',',$a->brand_id);
            //         $service_id = explode(',',$a->another_servId);
    
            //         $qty = ProductBrand::select(\DB::raw("(GROUP_CONCAT(DISTINCT qty SEPARATOR ',')) as 'qty' "))->where('product_id',$a->id)->first();
            //         $totalqty = explode(',',$qty->qty);
            //         $a['qty'] = array_sum($totalqty);
            //         $brands = Brand::select(\DB::raw("(GROUP_CONCAT(DISTINCT brand_name SEPARATOR ',')) as 'brand_name' "))
            //                         ->whereIn('id',$brand_id)->first();
            //         $a['brands'] = $brands->brand_name;
            //         $services = Service::select(\DB::raw("(GROUP_CONCAT(DISTINCT service_name SEPARATOR ',')) as 'services' "))
            //                         ->whereIn('id',$service_id)->first();
            //         $a['services'] = $services->services;
            //     }
                

            // }
        
        
        }else if($brand_name == '' && $service_type == '' ){
            
            
        }else if($stock_type == '' && $service_type == ''){
            
        }
        

        if(isset($products) && !empty($products)){
            return $products;
        }else{
            return false;
        }
    }
}
