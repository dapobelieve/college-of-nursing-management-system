<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['student_id', 'reference', 'amount', 'payment_modes_id', 'status'];

    public function student(){
      return $this->belongsTo('App\Models\Student');
    }
}
