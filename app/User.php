<?php

namespace App;

use Actuallymab\LaravelComment\CanComment;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use CanComment;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [

        'name', 'email', 'password', 'avatar', 'provider', 'provider_id'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}