<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class JobCard extends Model
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
    
    public static function getData($id){
        
        $data = static::select('job_cards.service_id','services.service_name')
                ->leftjoin('services','services.id','=','job_cards.service_id')
                ->where('job_cards.job_id',$id)
                ->groupBy('job_cards.service_id')
                ->get();

        foreach($data as $d){
            $d['serviceData'] = static::select('job_cards.*','sub_services.sub_service_name','sub_services.unit_price','products.product_name')
                                ->leftjoin('sub_services','sub_services.id','=','job_cards.sub_service_id')
                                ->leftjoin('products','products.id','=','job_cards.product_id')
                                ->where('job_cards.service_id',$d->service_id)
                                ->where('job_cards.job_id',$id)
                                ->get();

        }

        if(isset($data) && !empty($data)){
            return $data;
        }else{
            return false;
        }
    }

    public static function getCardTotalData($id){
        $data = static::select('job_cards.*','services.service_name')
                ->leftjoin('services','services.id','=','job_cards.service_id')
                ->where('job_cards.job_id',$id)
                ->groupBy('job_cards.service_id')
                ->get();
        foreach($data as $d){
            $d['serviceData'] = static::select('job_cards.*','sub_services.sub_service_name','sub_services.unit_price','products.product_name')
                                ->leftjoin('sub_services','sub_services.id','=','job_cards.sub_service_id')
                                ->leftjoin('products','products.id','=','job_cards.product_id')
                                ->where('job_cards.service_id',$d->service_id)
                                ->where('job_cards.job_id',$id)
                                ->get();

            foreach($d['serviceData'] as $sub){
                $sub['sub_price'] = $sub->qty * $sub->unit_price;
                $d['sub_total_price'] += $sub['sub_price'];
            }

        }
        if(isset($data) && !empty($data)){
            return $data;
        }else{
            return false;
        }
    }


    public static function getProposal($id){

        $data = \DB::table('job_proposals')->select('job_proposals.*','services.service_name')
                    ->leftjoin('services','services.id','=','job_proposals.service_id')
                    ->where('job_proposals.job_id','=',$id)
                    ->groupBy('job_proposals.service_id')
                    ->get();
                
        foreach($data as $d){
            $d->serviceData = \DB::table('job_proposals')
                                    ->select('job_proposals.*','sub_services.sub_service_name','products.product_name','job_cards.qty','job_cards.unit_variable')
                                    ->leftjoin('sub_services','sub_services.id','=','job_proposals.sub_service_id')
                                    ->leftjoin('products','products.id','=','job_proposals.product_id')
                                    ->leftjoin('job_cards','job_cards.sub_service_id','job_proposals.sub_service_id')
                                    ->where('job_proposals.service_id',$d->service_id)
                                    ->get();   

        }
        //prd($data->toArray());
        if(isset($data) && !empty($data)){
            return $data;
        }else{
            return false;
        }
    }
}
