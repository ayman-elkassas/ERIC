<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
    public function p_user():object {
        return $this->belongsTo(PUsers::class,'user_id');
    }
}
