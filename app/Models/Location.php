<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['state_id', 'lga'];


    public function state(){
      return $this->belongsTo('App\Models\state');
    }
}
