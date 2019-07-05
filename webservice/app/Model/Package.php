<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';
    public $timestamps = false;

    public function packcat()
    {
       return $this->hasMany(PackageCategory::class);
    }
}
