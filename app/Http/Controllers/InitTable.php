<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    //
    use Init;
    protected $tableClass = PermissionTable::class;
}
