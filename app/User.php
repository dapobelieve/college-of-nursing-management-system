<?php

namespace App;

use App\Models\Admin;
use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role;
use App\Models\State;
use App\Models\Image;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'sex', 'dob', 'email', 'password',
        'phone', 'address', 'city', 'state_id', 'location_id', 'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function lecturer()
    {
        return $this->hasOne(Lecturer::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    /**
     * The role relationship
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();;
    }

    /**
     * Checks if a user has a role(s)
     */
    public function hasRole($roles)
    {
        foreach($roles as $key => $role) {
            if ($this->roles->contains('name', ucfirst(strtolower($role))))
                return true;
        }

        return false;
    }

    /**
     * State relationship
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }


    /**
     * Get a concatenation of the user's first and last names
     */
    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Get a user's full name
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
    }
}
