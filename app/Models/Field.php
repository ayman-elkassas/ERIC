<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'category_id'
    ];

    //todo: belong to row in table with id
    public final function categoryRelated():object {
        return $this->belongsTo(Category::class,'category_id');
    }

    //todo:(M-M) relationship between user,fields in (prefer)
    //todo:name of relation table should be (first name of first table with out s _ next name without s)
    public final function userFollow():object {
        return $this->belongsToMany(User::class);
    }
}
