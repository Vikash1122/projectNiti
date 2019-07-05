<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ProductCat extends Model
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
    
    public static function InsertCategory($data, $picture) {
        
        $insert = new ProductCat();
        $insert->service_id = (isset($data['service_id'])) ? $data['service_id'] : '';
        $insert->sub_service_id =(isset($data['sub_service_id'])) ? $data['sub_service_id'] : NULL;
        $insert->name = (isset($data['name'])) ? $data['name'] : '';
        $insert->code = (isset($data['code'])) ? $data['code'] : NULL;
        $insert->cat_img = (isset($picture)) ? $picture: NULL;
        $insert->status = 1;
        $save = $insert->save();
        if ($save) {
            $insert_id = $insert->id;
            return $insert_id;
        }else{
            return false;
        }
    }


    public static function updateCategory($data, $id, $picture) {
        
        $update = static::where('id', $id)->first();
        $update->service_id =(isset($data['service_id'])) ? $data['service_id'] : NULL;
        $update->sub_service_id =(isset($data['sub_service_id'])) ? $data['sub_service_id'] : NULL;
        $update->name = (isset($data['name'])) ? $data['name'] : NULL;
        $update->code = (isset($data['code'])) ? $data['code'] : NULL;
        $update->cat_img = (isset($picture)) ? $picture: NULL;
        $save = $update->save();
        if ($save) {
            return $update;
        }else{
            return false;
        }
    }
}
