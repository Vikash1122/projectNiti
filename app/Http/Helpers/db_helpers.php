<?php

function dropdown ($type,$sId=null){
    switch($type){
        case 'services':
            $dp = DB::table('services')->select('title','id')->get();

            break;
    }
    return $dp;
}


?>