<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Studentapplicant;

class Cardapplicant extends Model
{


  public function studentapplicant()
  {
      return $this->hasOne(Studentapplicant::class);
  }
}
