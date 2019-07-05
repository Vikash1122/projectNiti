<?php

function uploadPath($name = null) {
    $path = public_path() . '/uploads/vehicles/' ;
    if (isset(\Auth::user()->name)) {
        $path = public_path() . '/uploads/' . \Auth::user()->name . '/';
        
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
    }
    //prd($path);
    if ($name) {
        $path = $path . $name;
    }
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }
    return $path;
}
/*---its for profile cover */
function fileUrl1($name = null) {
    if (isset(\Auth::user()->name)) {
        $path = '/uploads/' . \Auth::user()->name . '/';
    }
    if ($name) {
        $path = $path . $name;
    }
    return $path;
}
/*---its for all other images like portfolio,offers etc */
function fileUrl($name = null) {
    $path = 'http://3.16.87.53/public/uploads/vehicles/';
    if (isset(\Auth::user()->name)) {
        $path = 'http://3.16.87.53/public/uploads/vehicles/';
    }
    if ($name) {
        $path = $path . $name;
    }
    return $path;
}

function fileurlemp($name = null){
    $path = 'http://3.16.87.53/public/uploads/employees/';
    return $path;
}
function fileurlempdoc($name = null){
    $path = 'http://3.16.87.53/public/uploads/employees/documents/';
    return $path;
}

function fileurlservice($name = null){
    $path = 'http://3.16.87.53/public/uploads/services/';
    return $path;
}

function fileurlbrand($name = null){
    $path = 'http://3.16.87.53/public/uploads/brands/';
    return $path;
}

function fileurlbanner($name = null){
    $path = 'http://3.16.87.53/public/uploads/banners/';
    return $path;
}

function fileurlvehicle($name = null){
    $path = 'http://3.16.87.53/public/uploads/vehicles/';
    return $path;
}

function fileurlUser($name = null){
    $path = 'http://3.16.87.53/public/uploads/users/';
    return $path;
}

function fileurlReport($name = null){
    $path = 'http://3.16.87.53/public/uploads/surveyorReport/';
    return $path;
}

function fileurlCategory($name = null){
    $path = 'http://3.16.87.53/public/uploads/categories/';
    return $path;
}

function fileurlProduct($name = null){
    $path = 'http://3.16.87.53/public/uploads/products/';
    return $path;
}

function fileurlVendor($name = null){
    $path = 'http://3.16.87.53/public/uploads/vendors/';
    return $path;
}

function fileurlAdmin($name = null){
    $path = 'http://3.16.87.53/public/uploads/admin/';
    return $path;
}

function imageUrl($param) {
    if ($param) {
        return url($param);
    }
}
