<?php

namespace App\Models;

use App\Models\Posts;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable,HasRoles;

    protected $table='users';
    protected $primaryKey = 'id';
    //todo:should assign guard_name for spatie package
    Protected $guard_name ='user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
        'avatar',
        'phone',
        'skills',
        'fields_follow',
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

    //todo:Many relation
    //todo:Make Relationships as Eloquent (1-M) User,Post (each User has many posts)
    public final function posts():object {
        return $this->hasMany(Posts::class);
    }

    //todo:(M-M) relationship between user,fields in (prefer)
    //todo:name of relation table should be (first name of first table with out s _ next name without s)
    //todo:ex: between users and skills (user_skill)
    public final function fieldsFollowing():object {
        return $this->belongsToMany(Field::class);
    }

    public final function OwnSkills():object {
        return $this->belongsToMany(Skill::class);
    }

    public function getJWTIdentifier()
    {
        // TODO: Implement getJWTIdentifier() method.
    }

    public function getJWTCustomClaims()
    {
        // TODO: Implement getJWTCustomClaims() method.
    }
}
