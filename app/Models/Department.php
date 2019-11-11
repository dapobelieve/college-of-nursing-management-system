<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
  public function student(){
    return $this->hasMany('App\Models\Student');
  }
}
