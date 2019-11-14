<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use SoftDeletes;

    // Set the table to fetch records from
    protected $table = 'admins';

    // Columns to be mutated to dates
    protected $dates = ['deleted_at'];

    /**
     * Get the user model related with the admin
     */
    public function user()
    {
        $this->morphOne('App\User', 'userable');
    }
}
