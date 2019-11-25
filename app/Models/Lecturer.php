<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Department;

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
        return $this->morphOne('App\User', 'userable');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
