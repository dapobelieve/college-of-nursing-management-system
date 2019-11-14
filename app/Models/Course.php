<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];
  public function students(){
    return $this->belongsToMany('App\Models\Student')->withTimestamps();
  }

  public function department()
  {
      return $this->belongsTo(Department::class);
  }
}
