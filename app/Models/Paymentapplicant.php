<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paymentapplicant extends Model
{
    protected $fillable = [
      'studentapplicant_id', 'reference', 'payment_modes_id', 'amount', 'status'
    ];

    public function studentapplicant()
    {
        return $this->belongsTo('App\Models\Studentapplicant');
    }

}
