<?php

namespace App\Http\Controllers\Admin\UserMembers;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use App\Models\Category;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class NormalUserController extends Controller
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

    public final function getCategoriesWithFields():object{
        try {
            $all_categories_with_fields = Category::with('fieldsUnder')->get();

            return response()->json($all_categories_with_fields, 200);
        }catch (\Exception $ex){
            return response()->json("Error", 404);
        }
    }

    public final function getSkills():object{
        try {
            $all_skills = Skill::all();

            return response()->json($all_skills, 200);
        }catch (\Exception $ex){
            return response()->json("Error", 404);
        }
    }
}
