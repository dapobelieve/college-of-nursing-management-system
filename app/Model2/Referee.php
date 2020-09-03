<?php

namespace App\Model2;

use Illuminate\Database\Eloquent\Model;

class Referee extends Model
{

    protected $fillable = ['applicant_id', 'name',	'position',	'company',	'address',	'phone'];

    protected $connection = 'mysql2';

    public function applicant(){
      return $this->belongsTo('App\Model2\Applicant');
    }
  
}
