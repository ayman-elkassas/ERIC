<?php

namespace App\Http\Controllers\Admin\FieldManagment;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use App\Models\Category;
use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class NormalFieldController extends Controller
{
    //
    public function __construct()
    {
        //TODO:To Auth token who access this routes
        //todo:should insert in constructor of controller to auth with provider
        Config::set('jwt.user', Admins::class);
        Config::set('auth.providers', ['users' => [
            'driver' => 'eloquent',
            'model' => Admins::class,
        ]]);
    }

    public function RemoveAllFields () {
        DB::statement("SET foreign_key_checks=0");
        Field::truncate();
        DB::statement("SET foreign_key_checks=1");

        if(Field::all()->isEmpty()){
            return response()->json("Done Deleted All Fields", 200);
        }
        else{
            return response()->json("error", 400);
        }
    }
}
