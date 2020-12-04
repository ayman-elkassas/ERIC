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
        'name'
    ];

    //todo:Many relation
    //todo:Make Relationships as Eloquent (1-M) User,Post (each User has many posts)
    public final function fieldsUnder():object {
        return $this->hasMany(Field::class);
    }
}
