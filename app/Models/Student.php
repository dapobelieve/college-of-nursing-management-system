<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Student extends Model
{
  use SoftDeletes;

  // Columns to be mutated to dates
  protected $dates = ['deleted_at'];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'sponsors_name', 'department_id', 'level', 'sponsors_phone', 'marital_status', 'user_id', 'admission_no', 'matric_no'
  ];

  /**
   * Get the user model related with the student
   */
  /*public function user()
  {
    return $this->morphOne('App\User', 'userable');
  }*/



  public function user()
  {
      return $this->belongsTo('App\User');
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

  /**
  *get result
  */
  public function result(){
    return $this->hasOne('App\Models\Result');
  }

  public function payment(){
    return $this->hasMany('App\Models\Payment');
  }

}
