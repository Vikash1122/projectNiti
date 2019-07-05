<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Service extends Model
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

    public static function InsertService($data, $picture) {
        
        $insert = new Service();
        $insert->service_name = (isset($data['service_name'])) ? $data['service_name'] : '';
        $insert->service_code = (isset($data['service_code'])) ? $data['service_code'] : NULL;
        $insert->instant_service_price = (isset($data['instant_service_price'])) ? $data['instant_service_price'] : NULL;
        $insert->service_icon = (isset($picture)) ? $picture: NULL;
        $insert->status = 1;
        $save = $insert->save();
        if ($save) {
            $insert_id = $insert->id;
            return $insert_id;
        }else{
            return false;
        }
    }


    public static function updateService($data, $id, $picture) {
        
        $update = static::where('id', $id)->first();
        $update->service_name = (isset($data['service_name'])) ? $data['service_name'] : NULL;
        $update->service_code = (isset($data['service_code'])) ? $data['service_code'] : NULL;
        $update->instant_service_price = (isset($data['instant_service_price'])) ? $data['instant_service_price'] : NULL;
        $update->service_icon = (isset($picture)) ? $picture: NULL;
        $save = $update->save();
        if ($save) {
            return $update;
        }else{
            return false;
        }
    }
}
