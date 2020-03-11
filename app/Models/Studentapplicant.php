<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Studentapplicant extends Model
{
  protected $fillable = [
      'cardapplicant_id', 'first_name', 'middle_name', 'surname', 'gender', 'dob', 'email',
      'phone', 'home_address', 'state', 'state_id', 'lga', 'state_of_origin', 'pic_url',
      'sponsor_add', 'sponsor_name', 'sponsor_type', 'sponsor_email', 'sponsor_phone', 'religion',
      'reg_step', 'marital_status','exam_no', 'exam_type', 'mathematics', 'english','physics',
      'chemistry', 'biology', 'score', 'admission_status', 'department_id', 'date_exam'
  ];



  public function Cardapplicant()
  {
      return $this->belongsTo('App\Models\Cardapplicant');
  }

  public function paymentapplicant()
  {
      return $this->hasMany('App\Models\Paymentapplicant');
  }
}
