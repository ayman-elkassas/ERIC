<?php

namespace App\Http\Controllers\Admin\ResourcePdf;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class NormalResourcePdf extends Controller
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

    public function RemoveAllResourcesPdf () {
//        DB::statement("SET foreign_key_checks=0");
//        Resources::truncate();
//        DB::statement("SET foreign_key_checks=1");

        $resourcesPdf=(DB::table('resources')
            ->where('type', '=', 2))
            ->delete();

        if($resourcesPdf>0){
            return response()->json("Done Deleted All Resources Pdf", 200);
        }
        else{
            return response()->json("error", 400);
        }
    }
}
