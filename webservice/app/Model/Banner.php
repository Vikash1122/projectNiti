<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';
    public $timestamps = false;

    public static function viewallBanners($device_type){
        $data = static::select('banners.*')->orderBy('sort_order','Asc')->get();

            foreach($data as $d){
                if(isset($d['banner_img']) && !empty($d['banner_img'])){
                    $eurl = 'http://3.16.87.53/public/uploads/banners/'.$d['banner_img'];
               
                    $d['eurl'] = $eurl;
                }else{
                    $d['eurl'] = '';
                }
                
            }
       // print_r($data);die();
       if($data){
            return $data;
       }else{
           return false;
       }
    }
}
