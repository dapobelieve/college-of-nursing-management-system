<?php

namespace App\Model2;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Applicant extends Model
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'full_name', 'sex', 'phone', 'email', 'address', 'city', 'state', 'drug_test',
      'lga','position','emp_type', 'pic_url', 'dob'
    ];

    protected $connection = 'mysql2';


    public function referee(){
      return $this->hasMany('App\Model2\Referee');
    }

    public function education(){
      return $this->hasMany('App\Model2\Education');
    }

    public function emphistory(){
      return $this->hasMany('App\Model2\Emphistory');
    }

}
