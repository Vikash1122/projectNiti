<?php

function dateFormat($param) {
    if ($param) {
        @list($d, $m, $y) = explode('/', $param);
        if ($d && $m && $y) {
            return date('Y-m-d', strtotime($y . '-' . $m . '-' . $d));
        }
    }
}


function pr($string) {
    echo "<pre>";
    print_r($string);
    echo "</pre>";
}

function prd($string) {
    echo "<pre>";
    if (is_array($string)) {
        print_r($string);
    } elseif (is_string($string)) {
        echo $string;
    } else {
        var_dump($string);
    }
    echo "</pre>";
    die();
}



function get_continuous($signs)
{

    $user_id = \Auth::user()->id;
    $users = User::findOrfail($user_id);
    $signs = Sign::with('users')
        ->where('user_id', '=', $user_id)
        ->get();
    return $signs;

   // $shedule  = Schedule::with('users','signs')->where('user_id', '=', $user_id)->where('sign_id','=',$signID)->first();

    //$slide = Slide::with('users','playlists','schedules')->where('user_id', '=', $user_id)->where('sign_id','=',$signID)->get();
    //$playlist = Playlist::findOrFail($id);
    //  $shedule  = Schedule::with('users','signs')->where('user_id', '=', $user_id)->where('sign_id','=',$signID)->first();
    //prd($shedule);die();
  //  return view('admin.playlist.edit', compact('signs', 'user_id', 'users', 'slug', 'sign_id', 'slide'));
}



function hasPermissionThroughRole($data) {
    $prm =\App\Permission::get()->pluck('name')->toArray();
    
    $permission = \Auth::user()->hasPermission();
    $names = array_column($permission, 'name');
       if(in_array($data,$names)) {
          return true;
       }else{
        return false;
       }
    
}
?>

