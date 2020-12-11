<?php

namespace App\Http\Controllers\Admin\TopicManagment;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use function Sodium\add;

class TopicController extends Controller
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
            $all_main_topics = Category::with('categoryUser')->get();
            foreach ($all_main_topics as $topic) {
                try {
                    $val=imageToStreamBase64($topic->categoryUser()->get()[0]->avatar);
                    $avatar[$topic->categoryUser()->get()[0]->id]=$val;
                }catch (\Exception $ex){
                    continue;
                }
            }

            $all_main_topics->push($avatar);

            return response()->json($all_main_topics, 200);
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
            $topic=new Category();
            $topic->name=$request->get("topicName");
            $topic->user_id=(int)$request->get("Uid");

            $topic->save();

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
    }
}
