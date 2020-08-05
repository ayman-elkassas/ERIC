<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PUsers extends Model
{
    //Many relation
    //Make Relationships as Eloquent (1-M) user,post (each user has many posts)
    public function posts():object {
        return $this->hasMany(Posts::class);
    }
}
