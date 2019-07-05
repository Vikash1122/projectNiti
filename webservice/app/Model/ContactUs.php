<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'contact_uses';
    public $timestamps = false;


    public static function InsertQueries($input) {
        // print_r($data);die();
         $insert = new ContactUs();
         $insert->user_id = (isset($input['user_id'])) ? $input['user_id'] : '';
         $insert->email = (isset($input['email'])) ? $input['email'] : NULL;
         $insert->message = (isset($input['message'])) ? $input['message'] : NULL;
         $insert->status = 0;
         $save = $insert->save();
         if ($save) {
             $insert_id = $insert->id;
             return $insert_id;
         }else{
             return false;
         }
     }
}
