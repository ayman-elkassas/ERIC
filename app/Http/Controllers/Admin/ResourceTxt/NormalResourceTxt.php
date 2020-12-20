<?php

namespace App\Http\Controllers\Admin\ResourceTxt;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use App\Models\Resources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class NormalResourceTxt extends Controller
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

    public function RemoveAllResourcesTxt () {
        DB::statement("SET foreign_key_checks=0");
        Resources::truncate();
        DB::statement("SET foreign_key_checks=1");

        if(Resources::all()->isEmpty()){
            return response()->json("Done Deleted All Resources Text", 200);
        }
        else{
            return response()->json("error", 400);
        }
    }
}
