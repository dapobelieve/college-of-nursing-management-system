<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  public function department(){
    return $this->belongsTo('App\Models\Department');
  }

  public function courses(){
    return $this->belongsToMany('App\Models\Course')->withTimestamps();
  }
}
