<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role;
use App\Models\State;

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
        'phone', 'address', 'city', 'state_id', 'location_id'
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

    /**
     * The role relationship
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Checks if a user has a role(s)
     */
    public function hasRole(...$roles)
    {
        foreach($roles as $role) {
            if ($this->roles->contains('name', ucfirst(strtolower($role)))) {
                return true;
            }
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
     * Get the model that owns this user
     */
    public function userable()
    {
        $this->morphTo();
    }
}
