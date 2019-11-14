<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lecturer extends Model
{
    use SoftDeletes;

    /**
     * Get the user model related with the lecturer
     */
    public function user()
    {
        $this->morphOne('App\User', 'userable');
    }
}
