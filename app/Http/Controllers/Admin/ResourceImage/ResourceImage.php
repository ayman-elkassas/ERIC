<?php

namespace App\Http\Controllers\Admin\ResourceImage;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use App\Models\Resources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ResourceImage extends Controller
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

            $resourcesImage=Resources::with(["childeren","resourceUser","resourceField"])
                ->where("type","=","3")
                ->limit(25)->get();

            $avatar=[];
            $childeren=[];

            $data=array();
            foreach ($resourcesImage as $image) {
                if(count($image["childeren"])>0){
                    array_push($data,$image);
                }
            }

            foreach ($data as $obj){
                try {
                    $val= imageToStreamBase64($obj->resourceUser()->get()[0]->avatar);
                    $avatar[$obj->resourceUser()->get()[0]->id]=$val;
                    $obj->file_path=imageToStreamBase64($obj->file_path.$obj->file_name);
                    $childeren[$obj->id]=[];
                    foreach ($obj->childeren()->get() as $child){
                        array_push($childeren[$obj->id],imageToStreamBase64($child->file_path.$child->file_name));
                    }
                }catch (\Exception $ex){
                    continue;
                }
            }

            array_push($data,$childeren);
            array_push($data,$avatar);

            return response()->json($data, 200);
        }catch (\Exception $ex){
            return response()->json($ex->getMessage(), 404);
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

            $flagFirst=true;
            $parent_id=0;

            if(count($request->get("Album"))>0){
                foreach ($request->get("Album") as $file){

                    $resource=new Resources();

                    $upload_path="/Users/Resources/Album/".$request->get("Uid")."/";
                    $resource->file_path=$upload_path;
                    $resource->type=$request->get("resourceType");
                    $resource->user_id=$request->get("Uid");
                    $resource->field_id=$request->get("fieldId");
                    $resource->desc=$request->get("desc");

                    $imageStream=$file;

                    $mimeType=explode("/",mime_content_type($imageStream))[0];

                    $arr=saveInStorage($imageStream,$mimeType,"/Users/Resources/Album/",$request->get("Uid"));

                    $resource->size=Storage::disk("public")->size($arr[1].$arr[0]);

                    $resource->file_name=$arr[0];

                    if($flagFirst){
                        $resource->save();
                        $parent_id=$resource->id;
                        $flagFirst=false;
                    }
                    else{
                        $resource->parent_id=$parent_id;
                        $resource->save();
                    }
                }
            }

            return response()->json($resource, 200);
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

            $flagFirst=true;
            $parent_id=0;

            if(count($request->get("Album"))>0){

                $resource=Resources::findOrFail($id);

                Storage::disk("public")->delete($resource->file_path.$resource->file_name);

                foreach ($resource->childeren()->get() as $child){
                    Storage::disk("public")->delete($child->file_path.$child->file_name);
                }

                $resource->childeren()->delete();

                foreach ($request->get("Album") as $file){

                    $upload_path="/Users/Resources/Album/".$request->get("Uid")."/";
                    $resource->file_path=$upload_path;
                    $resource->type=$request->get("resourceType");
                    $resource->user_id=$request->get("Uid");
                    $resource->field_id=$request->get("fieldId");
                    $resource->desc=$request->get("desc");

                    $imageStream=$file;

                    $mimeType=explode("/",mime_content_type($imageStream))[0];

                    $arr=saveInStorage($imageStream,$mimeType,"/Users/Resources/Album/",$request->get("Uid"));

                    $resource->size=Storage::disk("public")->size($arr[1].$arr[0]);

                    $resource->file_name=$arr[0];

                    if($flagFirst){
                        $resource->save();
                        $parent_id=$resource->id;
                        $flagFirst=false;
                    }
                    else{
                        $resource->parent_id=$parent_id;
                        $resource->save();
                    }

                    $resource=new Resources();
                }
            }

            return response()->json($resource, 200);
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
            $resource=Resources::findOrFail($id);

            Storage::disk("public")->delete($resource->file_path.$resource->file_name);

            foreach ($resource->childeren()->get() as $child){
                Storage::disk("public")->delete($child->file_path.$child->file_name);
            }

            $resource->childeren()->delete();

            $resource->delete();

            return response()->json("Deleted Successfully", 200);
        }catch (\Exception $ex){
            return response()->json("Error", 404);
        }
    }
}
