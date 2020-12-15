<?php

namespace App\Http\Controllers\Admin\SkillManagment;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use App\Models\Category;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class SkillController extends Controller
{

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            $avatar=[];
            $all_main_skills = Skill::with('OwnSkills')->get();
            foreach ($all_main_skills as $skill) {
                try {
                    $val=imageToStreamBase64($skill->OwnSkills()->get()[0]->avatar);
                    $avatar[$skill->OwnSkills()->get()[0]->id]=$val;
                }catch (\Exception $ex){
                    continue;
                }
            }

            $all_main_skills->push($avatar);

            return response()->json($all_main_skills, 200);
        }catch (\Exception $ex){
            return response()->json("Error", 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            $topic=new Skill();
            $topic->name=$request->get("skillName");

            $topic->save();

            $topic->OwnSkills()->attach((int)$request->get("Uid"));

            return response()->json($topic, 200);
        }catch (\Exception $ex){
            return response()->json("Error", 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $topic=Skill::findOrFail($id);
            $topic->OwnSkills()->detach();
            $topic->name=$request->get("skillName");

            $topic->save();

            $topic->OwnSkills()->attach((int)$request->get("Uid"));

            return response()->json($topic, 200);
        }catch (\Exception $ex){
            return response()->json("Error", 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            Skill::findOrFail($id)->delete();

            return response()->json("Deleted Successfully", 200);
        }catch (\Exception $ex){
            return response()->json("Error", 404);
        }
    }
}
