<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'phone', 'address', 'password',
        'type', 'status', 'avatar', 'dob', 'gender', 'last_login', 'code'
    ];

    /**
     * Carbon Instances of dates
     * @var [type]
     */
    protected $dates = [
        'last_login', 'dob'
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
     * Hashes User Password
     * @param [type] $value [description]
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function avatar_url()
    {
        $baseDir = '/images/avatar/';
        return $baseDir . ($this->avatar ?  : 'avatar.png');
    }
}
