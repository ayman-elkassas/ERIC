<?php

namespace App\Http\Controllers\Admin\ResourceImage;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class NormalResourceImage extends Controller
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

    public function RemoveAllResourcesImage () {
//        DB::statement("SET foreign_key_checks=0");
//        Resources::truncate();
//        DB::statement("SET foreign_key_checks=1");

        $resourcesImage=(DB::table('resources')
            ->where('type', '=', 3))
            ->delete();

        if($resourcesImage>0){
            return response()->json("Done Deleted All Resources Image", 200);
        }
        else{
            return response()->json("error", 400);
        }
    }
}
