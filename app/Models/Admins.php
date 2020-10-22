<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Admins extends Authenticatable implements JWTSubject
{
    //
    use Notifiable,HasRoles;

    protected $table='admins';
    protected $primaryKey = 'id';
    //todo:should assign guard_name for spatie package
    Protected $guard_name ='adminAuthGuard';

//    /**
//     * The attributes that are mass assignable.
//     *
//     * @var array
//     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar'
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

    public function getJWTIdentifier()
    {
        // TODO: Implement getJWTIdentifier() method.
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        // TODO: Implement getJWTCustomClaims() method.
        return [];
    }
}
