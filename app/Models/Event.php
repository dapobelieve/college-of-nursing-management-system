<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  //protected $dates = ['created_at', 'updated_at', 'expiry_date'];
  protected $fillable = ['title', 'details', 'expiry_date'];

  public function images()
  {
      return $this->morphMany(Image::class, 'imageable');
  }
}
