<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $dates = ['created_at', 'updated_at', 'expiry_date'];
    protected $fillable = ['level', 'department_id', 'indigene', 'non_indigene'];

    /**
     * Get the department the fee belongs to
     */
    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }
}
