<?php

namespace App\Http\Controllers\Admin\UserMembers;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use App\Models\Category;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

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
    //todo:change
    public final function getSkillUser($id):object{
        try {
            $user=User::findOrFail($id);
            $skills=$user->OwnSkills()->get();

            return response()->json($skills, 200);
        }catch (\Exception $ex){
            return response()->json("Error", 404);
        }
    }

    public final function getFieldUser($id):object{
        try {
            $user=User::findOrFail($id);
            $fields=$user->fieldsFollowing()->get();

            return response()->json($fields, 200);
        }catch (\Exception $ex){
            return response()->json("Error", 404);
        }
    }

    public function RemoveAllUsers () {
        DB::statement("SET foreign_key_checks=0");
        User::truncate();
        DB::statement("SET foreign_key_checks=1");

        if(User::all()->isEmpty()){
            return response()->json("Done Deleted All Rolls", 200);
        }
        else{
            return response()->json("error", 400);
        }
    }

    public final function getUserByCharFromFName($searchChar):object{
        try {
            $users=DB::table('users')->where("fname",
            "like",$searchChar.'%')
                ->limit(10)
                ->get();

            foreach ($users as $user) {
                try {
                    $user->avatar=imageToStreamBase64($user->avatar);
                }catch (\Exception $ex){
                    continue;
                }
            }

            return response()->json($users, 200);
        }catch (\Exception $ex){
            return response()->json("Error", 404);
        }
    }


}
