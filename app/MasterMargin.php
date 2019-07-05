<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterMargin extends Model
{
    public static function InsertMargin($data) {
        
        $insert = new MasterMargin();
        $insert->amount = (isset($data['amount'])) ? $data['amount'] : '';
        $insert->margin = (isset($data['margin'])) ? $data['margin'] : NULL;
        $insert->status = 1;
        $save = $insert->save();
        if ($save) {
            $insert_id = $insert->id;
            return $insert_id;
        }else{
            return false;
        }
    }
}
