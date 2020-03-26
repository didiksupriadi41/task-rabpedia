<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /*
     * cn -> name
     * mail -> email
     * user -> username
     * ou -> organization
     * itbStatus -> itb_status
     */

    protected $table = 'sso_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'organization', 'itb_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    public function getAuthPassword()
    {
        return '';
    }

    public function role()
    {
        return $this->belongsTo('App\Role', 'role_id', 'id');
    }
}
