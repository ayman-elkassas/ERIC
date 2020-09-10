<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    //
    use Data;
    protected $tableClass = PermissionTable::class;

}
