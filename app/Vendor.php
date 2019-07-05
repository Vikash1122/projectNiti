<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use App\VendorService;


class Vendor extends Model
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


    public function vendor_services()
    {
        return $this->hasMany(VendorService::class);
    }

    
    public static function insertVendor($request,$data,$picture,$company_logo){
        //prd($data);
        $insert = new Vendor();
        $insert->company_name = (isset($data['company_name'])) ? $data['company_name'] : NULL;
        $insert->company_logo = (isset($company_logo)) ? $company_logo: NULL;
        $insert->registration_no = (isset($data['registration_no'])) ? $data['registration_no'] : NULL;
        $insert->owner_name = (isset($data['owner_name'])) ? $data['owner_name'] : NULL;
        $insert->email = (isset($data['email'])) ? $data['email'] : NULL;
        $insert->company_mobile = (isset($data['company_mobile'])) ? $data['company_mobile'] : NULL;
        $insert->fax_no = (isset($data['fax_no'])) ? $data['fax_no'] : NULL;
        $insert->address = (isset($data['address'])) ? $data['address'] : NULL;
        $insert->warehouse_addr = (isset($data['warehouse_addr'])) ? $data['warehouse_addr'] : NULL;
        $insert->profile_img = (isset($picture)) ? $picture: NULL;
        $insert->contact_person_name = (isset($data['contact_person_name'])) ? $data['contact_person_name'] : NULL;
        $insert->designation = (isset($data['designation'])) ? $data['designation'] : NULL;
        $insert->mobile = (isset($data['mobile'])) ? $data['mobile'] : NULL;
        $insert->contact_person_email = (isset($data['contact_person_email'])) ? $data['contact_person_email'] : NULL;
        $insert->emirates_id = (isset($data['emirates_id'])) ? $data['emirates_id'] : NULL;
        $insert->payment_term = (isset($data['payment_term'])) ? $data['payment_term'] : NULL;
        $insert->payment_method = (isset($data['payment_method'])) ? $data['payment_method'] : NULL;
        $insert->tax_reg_number = (isset($data['tax_reg_number'])) ? $data['tax_reg_number'] : NULL;
        $insert->biling_address = (isset($data['biling_address'])) ? $data['biling_address'] : NULL;
        $insert->bank_name = (isset($data['bank_name'])) ? $data['bank_name'] : NULL;
        $insert->ifsc_code = (isset($data['ifsc_code'])) ? $data['ifsc_code'] : NULL;
        $insert->branch_code = (isset($data['branch_code'])) ? $data['branch_code'] : NULL;
        $insert->account_no = (isset($data['account_no'])) ? $data['account_no'] : NULL;
        $insert->account_holder_name = (isset($data['account_holder_name'])) ? $data['account_holder_name'] : NULL;
        $insert->status = 1;
        $save = $insert->save();
        $insert_id = $insert->id;

        if ($save) {
            return $insert_id;
        }else{
            return false;
        }
    }

    public static function UpdateVendor($request,$data,$picture,$company_logo,$id){
        
        $update = static::where('id', $id)->first();
        $update->company_name = (isset($data['company_name'])) ? $data['company_name'] : NULL;
        $update->company_logo = (isset($company_logo)) ? $company_logo: NULL;
        $update->registration_no = (isset($data['registration_no'])) ? $data['registration_no'] : NULL;
        $update->owner_name = (isset($data['owner_name'])) ? $data['owner_name'] : NULL;
        $update->email = (isset($data['email'])) ? $data['email'] : NULL;
        $update->company_mobile = (isset($data['company_mobile'])) ? $data['company_mobile'] : NULL;
        $update->fax_no = (isset($data['fax_no'])) ? $data['fax_no'] : NULL;
        $update->address = (isset($data['address'])) ? $data['address'] : NULL;
        $update->warehouse_addr = (isset($data['warehouse_addr'])) ? $data['warehouse_addr'] : NULL;
        $update->profile_img = (isset($picture)) ? $picture: NULL;
        $update->contact_person_name = (isset($data['contact_person_name'])) ? $data['contact_person_name'] : NULL;
        $update->designation = (isset($data['designation'])) ? $data['designation'] : NULL;
        $update->mobile = (isset($data['mobile'])) ? $data['mobile'] : NULL;
        $update->contact_person_email = (isset($data['contact_person_email'])) ? $data['contact_person_email'] : NULL;
        $update->emirates_id = (isset($data['emirates_id'])) ? $data['emirates_id'] : NULL;
        $update->payment_term = (isset($data['payment_term'])) ? $data['payment_term'] : NULL;
        $update->payment_method = (isset($data['payment_method'])) ? $data['payment_method'] : NULL;
        $update->tax_reg_number = (isset($data['tax_reg_number'])) ? $data['tax_reg_number'] : NULL;
        $update->biling_address = (isset($data['biling_address'])) ? $data['biling_address'] : NULL;
        $update->bank_name = (isset($data['bank_name'])) ? $data['bank_name'] : NULL;
        $update->ifsc_code = (isset($data['ifsc_code'])) ? $data['ifsc_code'] : NULL;
        $update->branch_code = (isset($data['branch_code'])) ? $data['branch_code'] : NULL;
        $update->account_no = (isset($data['account_no'])) ? $data['account_no'] : NULL;
        $update->account_holder_name = (isset($data['account_holder_name'])) ? $data['account_holder_name'] : NULL;
        $save = $update->save();
        
        if ($save) {
            return $update;
        }else{
            return false;
        }
    }


    public static function getAllPaymentServiceFilter($data){

        $payment_term= $data['payment_term'];
        $payment_method = $data['payment_method'];
        $service_type = $data['service_type'];
        $myarray = array();
        if($payment_term == '' && $payment_method == ''){

            $vendor_id = VendorService::select('vendor_id')
                    ->where('service_id','=',$service_type)
                    ->groupBy('vendor_id')
                    ->get();

            $arr = array();
            foreach($vendor_id as $vndr){
                $vendor = Vendor::select('vendors.*')
                            ->where('id','=',$vndr->vendor_id)
                            ->first();
                array_push($arr,$vendor);
            }        
            
        }else if($payment_term == '' && $service_type == '' ){
            
            if($payment_method == 'All'){
                $arr = Vendor::select('vendors.*')
                            ->get();
            }else{
                $arr = Vendor::select('vendors.*')
                        ->where('payment_method','=',$payment_method)
                        ->get();
            }
            
        }else if($payment_method == '' && $service_type == ''){
            $arr = Vendor::select('vendors.*')
                        ->where('payment_term','=',$payment_term)
                        ->get();
        }
        

        if(isset($arr) && !empty($arr)){
            return $arr;
        }else{
            return false;
        }
    }
}
