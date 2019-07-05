<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use App\PackageService;

class Package extends Model
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
    
    public function packcat()
    {
       return $this->hasMany(PackageCategory::class);
    }

    public static function InsertPackage($data) {
        
        $insert = new Package();
        $insert->package_type = (isset($data['package_type'])) ? $data['package_type'] : '';
        $insert->package_price = (isset($data['package_price'])) ? $data['package_price'] : NULL;
        $insert->callouts = (isset($data['callouts'])) ? $data['callouts'] : NULL;
        
        $save = $insert->save();
        if ($save) {
            $insert_id = $insert->id;
            return $insert_id;
        }else{
            return false;
        }
    }

    public static function updateContract($data,$id){
        
        $update = static::where('id', $id)->first();
        $update->package_type = (isset($data['package_type'])) ? $data['package_type'] : NULL;
        $update->package_price = (isset($data['package_price'])) ? $data['package_price'] : NULL;
        $update->callouts = (isset($data['callouts'])) ? $data['callouts'] : NULL;
        $save = $update->save();
        
        if ($save) {
            return $update;
        }else{
            return false;
        }
    }

    public static function viewPackage(){
        $pkgs = static::groupBy('package_type')->get();;
        // echo "<pre>"; print_r($pkgs);exit ;
        $daaaaa = array();
        foreach($pkgs as $k=>$pkg){
            $pkg_id = $pkg['package_type'] ; // PKG name 
            $pid = $pkg['id'] ; // PKG id
            $datas = static::where("package_type", $pkg_id)->get();
            $daaaaa[$k]['pkg_name'] = $pkg_id ;
            $daaaaa[$k]['pkg_id'] = $pid ;
            foreach($datas as $i=>$data){
                $id = $data['id'] ;
                $daaaaa[$k]['srvc_name'][$i] = $data['package_category'] ;
                $services = \DB::table("package_services")->where("package_id", $id)->get();
                foreach($services as $j=>$srvcs){
                    $daaaaa[$k]['ser_data'][$j]['pkg_service_name'] = $srvcs->pkg_service_name;
                    $daaaaa[$k]['ser_data'][$j]['pkg_service_desc'] = $srvcs->pkg_service_desc;
                    
                } 
                //$daaaaa[$k]['srvc_name']['srvc_detail'][$i] = $srvc_detail ;
            }
        } 
        
        if($data){
            return $data;
        }else{
            return false;
        }
    }
}
