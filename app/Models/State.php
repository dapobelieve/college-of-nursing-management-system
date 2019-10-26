<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class State extends Model
{
    protected $fillable = ['name'];
//relationship to location
    public function location(){
      return $this->hasMany('App\Models\Location');
    }


//relationship to user table
    public function user(){
      return $this->hasMany(User::class);
    }
}
