<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Studentapplicant;

class Cardapplicant extends Model
{
  protected $fillable = ['reg_no', 'password', 'pin', 'invoice_id'];
  protected $casts = [
    'is_closed' => 'boolean',
];

  public function studentapplicant()
  {
      return $this->hasOne(Studentapplicant::class);
  }

  public function invoice()
  {
      return $this->belongsTo('App\Models\Invoice');
  }
}
