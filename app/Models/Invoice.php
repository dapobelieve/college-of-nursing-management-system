<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;

class Invoice extends Authenticatable implements CanResetPassword
{
    use Notifiable, CanResetPasswordTrait;

    protected $fillable = ['email', 'dob', 'password', 'reg_no', 'metadata', 'phone'];

    public function cardapplicant()
    {
        return $this->hasMany('App\Models\Cardapplicant');
    }
}
