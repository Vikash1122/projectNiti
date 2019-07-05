<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Job;

class Amc extends Model
{
    protected $table = 'amcs';
    public $timestamps = false;
    

    public static function InsertAmc($input) {
        $insert = new Amc();
        $insert->user_id = (isset($input['user_id'])) ? $input['user_id'] : '';
        $insert->title = (isset($input['title'])) ? $input['title'] : NULL;
        $insert->villa_or_aptNo = (isset($input['villa_or_aptNo'])) ? $input['villa_or_aptNo']: NULL;
        $insert->building_name = (isset($input['building_name'])) ? $input['building_name']: NULL;
        $insert->no_ofBedrooms = (isset($input['no_ofBedrooms'])) ? $input['no_ofBedrooms']: NULL;
        $insert->area = (isset($input['area'])) ? $input['area']: NULL;
        $insert->street_no = (isset($input['street_no'])) ? $input['street_no']: NULL;
        $insert->lat = (isset($input['lat'])) ? $input['lat']: NULL;
        $insert->lng = (isset($input['lng'])) ? $input['lng']: NULL;
        $insert->address = (isset($input['address'])) ? $input['address']: NULL;
        $insert->package_id = (isset($input['package_id'])) ? $input['package_id']: NULL;
        $insert->package_status = 0;
        $insert->amc_status = 0;
        $insert->amc_price = (isset($input['amc_price'])) ? $input['amc_price']: NULL;
        $insert->start_date = date("Y-m-d");
        $insert->end_date = date('Y-m-d', strtotime('+1 years'));
        $insert->type = 1;
        $save = $insert->save();
        if ($save) {
            $insert_id = $insert->id;
            return $insert_id;
        }else{
            return false;
        }
    }

    public static function InsertGuest($input) {
        $insert = new Amc();
        $insert->user_id = (isset($input['user_id'])) ? $input['user_id'] : '';
        $insert->title = (isset($input['title'])) ? $input['title'] : NULL;
        $insert->villa_or_aptNo = (isset($input['villa_or_aptNo'])) ? $input['villa_or_aptNo']: NULL;
        $insert->building_name = (isset($input['building_name'])) ? $input['building_name']: NULL;
        $insert->no_ofBedrooms = (isset($input['no_ofBedrooms'])) ? $input['no_ofBedrooms']: NULL;
        $insert->area = (isset($input['area'])) ? $input['area']: NULL;
        $insert->street_no = (isset($input['street_no'])) ? $input['street_no']: NULL;
        $insert->lat = (isset($input['lat'])) ? $input['lat']: NULL;
        $insert->lng = (isset($input['lng'])) ? $input['lng']: NULL;
        $insert->address = (isset($input['address'])) ? $input['address']: NULL;
        $insert->package_id = (isset($input['package_id'])) ? $input['package_id']: NULL;
        $insert->package_status = 0;
        $insert->amc_status = 0;
        $insert->amc_price = (isset($input['inspection_charges'])) ? $input['inspection_charges']: NULL;
        $insert->card_id = (isset($input['card_id'])) ? $input['card_id'] : NULL;
       // $insert->payment_status = (isset($input['payment_status'])) ? $input['payment_status'] : NULL;
            
        // $insert->start_date = date("Y-m-d");
        // $insert->end_date = date('Y-m-d', strtotime('+1 years'));
        $insert->type = 0;
        $save = $insert->save();
        if ($save) {
            $insert_id = $insert->id;
            return $insert_id;
        }else{
            return false;
        }
    }

    public static function viewAllAmc($input){
        $data = static::select('amcs.*','packages.package_type','packages.callouts')
                ->leftjoin('packages','packages.id','=','amcs.package_id')
                ->where('amcs.type','=',1)
                ->where('user_id','=',$input['user_id'])
                ->get();

        
        foreach($data as $d){
            $totalcallout = Job::where('amc_id','=',$d->id)->where('user_id','=',$input['user_id'])->get();
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

            // $daate = explode('-',$d->end_date);
            // $year = $daate[0];
            // $month = $date[1];
            // $day = $date[2];

            // $daate1 = explode('-',date('d-m-Y'));
            // $year1 = $daate1[0];
            // $month1 = $daate1[1];
            // $day1 = $daate1[2];

            // if(($year1 > $year) && ($month1 > $month) && ($day1 > $day))
            // {
            //     $d['reniew_button'] = 'Reniew';
            // }else{
            //     $d['reniew_button'] = '';
            // }
            

        }
//print_r($data);die();
        if(isset($data) && !empty($data)){
            return $data;
        }else{
            return false;
        }
    }

    public static function viewAllPendingAmc($input){
        $data = static::select('amcs.*','packages.package_type','packages.callouts')
                ->leftjoin('packages','packages.id','=','amcs.package_id')
                ->where('amcs.type','=',1)
                ->where('user_id','=',$input['user_id'])
                ->where('amc_status','=',0)
                ->get();

        
        foreach($data as $d){
            $totalcallout = Job::where('amc_id','=',$d->id)->where('user_id','=',$input['user_id'])->get();
            $d['remaining_callouts'] = $d->callouts - count($totalcallout);
            
        }

        if(isset($data) && !empty($data)){
            return $data;
        }else{
            return false;
        }
       // print_r($data);die();
    }
}
