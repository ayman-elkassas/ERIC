<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    public final function courseUser():object {
        return $this->belongsTo(User::class,'user_id');
    }

    public final function courseField():object {
        return $this->belongsTo(Field::class,'field_id');
    }
}
