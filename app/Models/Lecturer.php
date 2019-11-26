<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Department;
use App\User;

class Lecturer extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    // Columns to be mutated to dates
    protected $dates = ['deleted_at'];

    /**
     * Get the user model related with the lecturer
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
