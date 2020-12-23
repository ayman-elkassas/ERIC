<?php

namespace App\Http\Controllers\Admin\ResourceTxt;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use App\Models\PostAttachment;
use App\Models\Posts;
use App\Models\Resources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ResourceTxt extends Controller
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

            $resourcesTxt=((DB::table('resources')
                ->where('type', '=', 1))
                ->join("users","users.id","=","resources.user_id")
                ->join("fields","fields.id","=","resources.field_id"))
                ->select("resources.id",
                    "resources.user_id",
                    "resources.field_id",
                    "resources.file_name",
                    "resources.file_path",
                    "resources.desc",
                    "resources.created_at",
                    "users.fname",
                    "users.lname",
                    "users.avatar",
                    "fields.name")
                ->get();

            foreach ($resourcesTxt as $txt) {
                try {
                    $txt->avatar=imageToStreamBase64($txt->avatar);
                    $txt->file_path=convertToBase64($txt->file_path.$txt->file_name);
                }catch (\Exception $ex){
                    continue;
                }
            }

            return response()->json($resourcesTxt, 200);
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

            $resource=new Resources();

            $name=time().'.pdf';

            $pdf=txtToPdf(strip_tags($request->get("txtContent")),$name);
            $resource->file_name=$name;
            $upload_path="/Users/Resources/Text/".$request->get("Uid")."/";
            $resource->file_path=$upload_path;
            $resource->type=$request->get("resourceType");

            Storage::disk("public")->put($upload_path.$name, (string) $pdf, 'public');
            $resource->size=Storage::disk("public")->size($upload_path.$name);
            $resource->user_id=$request->get("Uid");
            $resource->field_id=$request->get("fieldId");
            $resource->desc=$request->get("desc");

            $resource->save();

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

            $resource=Resources::findOrFail($id);
            $resource->desc=$request->get("desc");
            $resource->user_id=$request->get("Uid");
            $resource->field_id=$request->get("fieldId");
            $resource->type=$request->get("resourceType");

            if(!empty($request->get("txtContent"))){
                Storage::disk("public")->delete($resource->file_path.$resource->file_name);
                $name=time().'.pdf';

                $pdf=txtToPdf($request->get("txtContent"),$name);
                $resource->file_name=$name;
                $upload_path="/Users/Resources/Text/".$request->get("Uid")."/";
                $resource->file_path=$upload_path;
                Storage::disk("public")->put($upload_path.$name, (string) $pdf, 'public');
                $resource->size=Storage::disk("public")->size($upload_path.$name);
            }

            $resource->save();

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
            Resources::findOrFail($id)->delete();

            return response()->json("Deleted Successfully", 200);
        }catch (\Exception $ex){
            return response()->json("Error", 404);
        }
    }
}
