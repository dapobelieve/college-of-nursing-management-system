<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use SoftDeletes;

    /**
     * Get the user model related with the admin
     */
    public function user()
    {
        $this->morphOne('App\User', 'userable');
    }
}
