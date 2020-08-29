<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class PUsers extends Authenticatable
{

    //Many relation
    //Make Relationships as Eloquent (1-M) User,Post (each User has many posts)
    public function posts():object {
        return $this->hasMany(Posts::class);
    }
}
