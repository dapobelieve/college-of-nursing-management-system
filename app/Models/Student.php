<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
  use SoftDeletes;

  /**
   * Get the user model related with the student
   */
  public function user()
  {
    $this->morphOne('App\User', 'userable');
  }

  /**
   * Get the department
   */
  public function department(){
    return $this->belongsTo('App\Models\Department');
  }

  /**
   * Get the courses offered by the student
   */
  public function courses(){
    return $this->belongsToMany('App\Models\Course')->withTimestamps();
  }
}
