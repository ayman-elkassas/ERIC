<?php

namespace App\Http\Controllers\Admin\PostManagment;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use App\Models\PostAttachment;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
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
    public function index():object
    {
        //
        try {

            $posts=Posts::with(["postUser"=>function ($query) {
                $query->select('fname', 'lname','email','avatar');
            }])->get();

            return response()->json($posts, 200);
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

            $post=new Posts();
            $post->title=$request->get("postTitle");
            $post->desc=$request->get("postContent");
            $post->type=$request->get("postType");
            $post->user_id=$request->get("Uid");
            $post->field_id=$request->get("fieldId");

            $post->save();

            if(count($request->get("attachments"))>0){
                foreach ($request->get("attachments") as $file){
                    $mimeType=explode("/",mime_content_type($file))[0];

                    $arr=saveInStorage($file,$mimeType,"/Users/post/attachments/",$post->id);

                    $postAttach=new PostAttachment();
                    $postAttach->file_name=$arr[0];
                    $postAttach->file_path=$arr[1].$arr[0];
                    $postAttach->size=Storage::disk("public")->size($arr[1].$arr[0]);
                    $postAttach->post_id=$post->id;

                    $postAttach->save();
                }
            }

            return response()->json($post, 200);
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
