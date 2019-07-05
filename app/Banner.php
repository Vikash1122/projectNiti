<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Banner extends Model
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

    
    
    public static function InsertBanner($data, $picture) {
        if(isset($data['schedule_date']) && !empty($data['schedule_date'])){
            $date = date("Y-m-d", strtotime($data['schedule_date']));
        }else{
            $date = NULL;
        }
        
        $insert = new Banner();
        $insert->title = (isset($data['title'])) ? $data['title'] : '';
        $insert->banner_url = (isset($data['banner_url'])) ? $data['banner_url'] : NULL;
        $insert->sort_order = (isset($data['sort_order'])) ? $data['sort_order'] : NULL;
        $insert->banner_img = (isset($picture)) ? $picture: NULL;
        $insert->activate_type = (isset($data['activate_type'])) ? $data['activate_type'] : NULL;
        $insert->schedule_date = (isset($date)) ? $date : NULL;
        //$insert->status = 1;
        $save = $insert->save();
        if ($save) {
            $insert_id = $insert->id;
            return $insert_id;
        }else{
            return false;
        }
    }

    public static function updateBanner($data, $id, $picture) {
        
        $date = date("Y-m-d", strtotime($data['schedule_date']));

        $update = static::where('id', $id)->first();
        $update->title = (isset($data['title'])) ? $data['title'] : NULL;
        $update->banner_url = (isset($data['banner_url'])) ? $data['banner_url'] : NULL;
        $update->sort_order = (isset($data['sort_order'])) ? $data['sort_order'] : NULL;
        $update->banner_img = (isset($picture)) ? $picture: NULL;
        $update->activate_type = (isset($data['activate_type'])) ? $data['activate_type'] : NULL;
        $update->schedule_date = (isset($date)) ? $date : NULL;
        $save = $update->save();
        if ($save) {
            return $update;
        }else{
            return false;
        }
    }

}
