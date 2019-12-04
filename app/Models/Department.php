<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
  protected $guarded = [];

  /**
   * Get department students
   */
  public function student(){
    return $this->hasMany('App\Models\Student');
  }

  /**
   * Get department fees
   */
  public function fee()
  {
    return $this->hasMany('App\Models\Fee');
  }
}
