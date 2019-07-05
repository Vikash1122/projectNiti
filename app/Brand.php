<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Brand extends Model
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


    
    public static function InsertBrand($data, $picture) {
        
        $insert = new Brand();
        $insert->brand_name = (isset($data['brand_name'])) ? $data['brand_name'] : '';
        $insert->brand_code = (isset($data['brand_code'])) ? $data['brand_code'] : NULL;
        $insert->brand_icon = (isset($picture)) ? $picture: NULL;
        $save = $insert->save();
        if ($save) {
            $insert_id = $insert->id;
            return $insert_id;
        }else{
            return false;
        }
    }


    public static function updateBrand($data, $id, $picture) {
        
        $update = static::where('id', $id)->first();
        $update->brand_name = (isset($data['brand_name'])) ? $data['brand_name'] : NULL;
        $update->brand_code = (isset($data['brand_code'])) ? $data['brand_code'] : NULL;
        $update->brand_icon = (isset($picture)) ? $picture: NULL;
        $save = $update->save();
        if ($save) {
            return $update;
        }else{
            return false;
        }
    }
}
