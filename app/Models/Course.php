<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  public function students(){
    return $this->belongsToMany('App\Models\Student')->withTimestamps();
  }
}
