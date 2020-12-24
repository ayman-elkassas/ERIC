<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public final function parent():object
    {
        return $this->hasOne(Resources::class,"id","parent_id");
    }

    public final function childeren():object
    {
        return $this->hasMany(Resources::class,"parent_id","id");
    }

    public final function resourceUser():object {
        return $this->belongsTo(User::class,'user_id');
    }

    public final function resourceField():object {
        return $this->belongsTo(Field::class,'field_id');
    }
}
