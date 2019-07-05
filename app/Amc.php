<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Jobs;

class Amc extends Model
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
    
    public static function viewAllAmc($id){
        $data = static::select('amcs.*','packages.package_type','packages.callouts')
                ->leftjoin('packages','packages.id','=','amcs.package_id')
                ->where('type','=',1)
                ->where('user_id','=',$id)
                ->get();

        foreach($data as $d){
            $totalcallout = Jobs::where('amc_id','=',$d->id)->where('user_id','=',$id)->get();
            $d['remaining_callouts'] = $d->callouts - count($totalcallout);

            if($d->amc_status == 0 && $d->amc_price == NULL && $d->package_status == 0){
                $d['amc_button'] = 'Pending';
                $d['reniew_button'] = '';
            }elseif($d->amc_status == 1 && $d->amc_price != NULL && $d->package_status == 0){
                $d['amc_button'] = 'Pay';
                $d['reniew_button'] = '';
            }elseif($d->amc_status == 1 && $d->amc_price != NULL && $d->package_status == 1){
                $d['amc_button'] = 'Upgrade';
                $d['reniew_button'] = 'Reniew';
            }else{
                $d['amc_button'] = '';
                $d['reniew_button'] = '';
            }

        }
        if(isset($data) && !empty($data)){
            return $data;
        }else{
            return false;
        }
    }
}
