<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];

    public function student(){
    return $this->hasMany('App\Models\Student');
  }
}
