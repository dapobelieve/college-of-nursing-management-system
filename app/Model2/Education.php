<?php

namespace App\Model2;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
  protected $fillable = ['applicant_id', 'schoolname', 'location',	'start_date',	'end_date',	'certified',	'major'];

  protected $connection = 'mysql2';

  protected $table = 'educations';

  public function applicant(){
    return $this->belongsTo('App\Model2\Applicant');
  }
}
