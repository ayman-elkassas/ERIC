<?php

namespace App\Http\Controllers\Admin\SkillManagment;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use App\Models\Field;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class NormalSkillController extends Controller
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

    public function RemoveAllSkills () {
        DB::statement("SET foreign_key_checks=0");
        Skill::truncate();
        DB::statement("SET foreign_key_checks=1");

        if(Skill::all()->isEmpty()){
            return response()->json("Done Deleted All Skills", 200);
        }
        else{
            return response()->json("error", 400);
        }
    }
}
