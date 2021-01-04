<?php

namespace App\Http\Controllers\Admin\CourseManagment;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use App\Models\CourseAttachments;
use App\Models\Courses;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
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
            $courses=Courses::with(["courseUser","courseField"])->get();
            foreach ($courses as $course) {
                try {
                    $course->course_cover=imageToStreamBase64($course->course_cover);
                    $val=imageToStreamBase64($course->courseUser()->get()[0]->avatar);
                    $avatar[$course->courseUser()->get()[0]->id]=$val;
                }catch (\Exception $ex){
                    continue;
                }
            }

            $courses->push($avatar);


//            $posts=Posts::with("postUser",function ($query) {
//                $query->select('fname', 'lname','email','avatar');
//            })->get();

            return response()->json($courses, 200);
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

            $course=new Courses();
            $course->title=$request->get("postTitle");
            $course->desc=$request->get("postContent");
            $course->type=$request->get("postType");
            $course->user_id=$request->get("Uid");
            $course->field_id=$request->get("fieldId");
            $course->price=$request->get("price");

            $course->save();

            $mimeType=explode("/",mime_content_type($request->get("postCover")))[0];

            $arr=saveInStorage($request->get("postCover"),$mimeType,"/Users/course/cover/",$course->id);
            $course->course_cover=$arr[1].$arr[0];
            $course->save();

            if(count($request->get("attachments"))>0){
                foreach ($request->get("attachments") as $file){
                    $mimeType=explode("/",mime_content_type($file))[0];

                    $arr=saveInStorage($file,$mimeType,"/Users/course/attachments/",$course->id);

                    $courseAttach=new CourseAttachments();
                    $courseAttach->file_name=$arr[0];
                    $courseAttach->file_path=$arr[1].$arr[0];
                    $courseAttach->size=Storage::disk("public")->size($arr[1].$arr[0]);
                    $courseAttach->course_id=$course->id;

                    $courseAttach->save();
                }
            }

            return response()->json($course, 200);
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

            $course=Courses::findOrFail($id);
            $course->title=$request->get("postTitle");
            $course->desc=$request->get("postContent");
            $course->type=$request->get("postType");
            $course->user_id=$request->get("Uid");
            $course->field_id=$request->get("fieldId");
            $course->price=$request->get("price");

            $course->save();

            if(count($request->get("attachments"))>0){
                Storage::disk("public")->delete("/Users/post/attachments/".$course->id);
                foreach ($request->get("attachments") as $file){
                    $mimeType=explode("/",mime_content_type($file))[0];

                    $arr=saveInStorage($file,$mimeType,"/Users/post/attachments/",$course->id);

                    $courseAttach=new CourseAttachments();
                    $courseAttach->file_name=$arr[0];
                    $courseAttach->file_path=$arr[1].$arr[0];
                    $courseAttach->size=Storage::disk("public")->size($arr[1].$arr[0]);
                    $courseAttach->post_id=$course->id;

                    $courseAttach->save();
                }
            }

            return response()->json($course, 200);
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
            Courses::findOrFail($id)->delete();

            return response()->json("Deleted Successfully", 200);
        }catch (\Exception $ex){
            return response()->json("Error", 404);
        }
    }
}
