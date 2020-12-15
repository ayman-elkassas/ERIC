<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_id'
    ];

    //todo:Many relation
    //todo:Make Relationships as Eloquent (1-M) User,Post (each User has many posts)
    public final function fieldsUnder():object {
        return $this->hasMany(Field::class);
    }

    public final function categoryUser():object {
        //todo: if does not put foreignKey null will return in your response
        return $this->belongsTo(User::class,'user_id');
    }
}
