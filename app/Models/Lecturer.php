<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lecturer extends Model
{
    use SoftDeletes;

    // Columns to be mutated to dates
    protected $dates = ['deleted_at'];

    /**
     * Get the user model related with the lecturer
     */
    public function user()
    {
        $this->morphOne('App\User', 'userable');
    }
}
