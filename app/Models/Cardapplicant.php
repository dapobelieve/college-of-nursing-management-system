<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Studentapplicant;

class Cardapplicant extends Model
{
  protected $fillable = ['reg_no', 'password', 'pin'];

  public function studentapplicant()
  {
      return $this->hasOne(Studentapplicant::class);
  }
}
