<?php

namespace App\Model2;

use Illuminate\Database\Eloquent\Model;

class Emphistory extends Model
{

    protected $fillable = ['applicant_id', 'employer',	'job_title',	'emp_date',	'address',	'city',	'state'];

    protected $connection = 'mysql2';

    public function applicant(){
      return $this->belongsTo('App\Model2\Applicant');
    }
  
}
