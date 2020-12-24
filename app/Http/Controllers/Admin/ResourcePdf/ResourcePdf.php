<?php

namespace App\Http\Controllers\Admin\ResourcePdf;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use App\Models\PostAttachment;
use App\Models\Resources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ResourcePdf extends Controller
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

            $resourcesPdf=((DB::table('resources')
                ->where('type', '=', 2))
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

            foreach ($resourcesPdf as $pdf) {
                try {
                    $pdf->avatar=imageToStreamBase64($pdf->avatar);
                    $pdf->file_path=convertToBase64($pdf->file_path.$pdf->file_name);
                }catch (\Exception $ex){
                    continue;
                }
            }

            return response()->json($resourcesPdf, 200);
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

            $upload_path="/Users/Resources/Pdf/".$request->get("Uid")."/";
            $resource->file_path=$upload_path;
            $resource->type=$request->get("resourceType");
            $resource->user_id=$request->get("Uid");
            $resource->field_id=$request->get("fieldId");
            $resource->desc=$request->get("desc");

            $pdfStream=$request->get("pdfContent");

            $mimeType=explode("/",mime_content_type($pdfStream))[0];

            $arr=saveInStorage($pdfStream,$mimeType,"/Users/Resources/Pdf/",$request->get("Uid"));

            $resource->size=Storage::disk("public")->size($arr[1].$arr[0]);

            $resource->file_name=$arr[0];

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

            if(!empty($request->get("pdfContent"))){
                Storage::disk("public")->delete($resource->file_path.$resource->file_name);
                $pdfStream=$request->get("pdfContent");

                $mimeType=explode("/",mime_content_type($pdfStream))[0];

                $arr=saveInStorage($pdfStream,$mimeType,"/Users/Resources/Pdf/",$request->get("Uid"));

                $resource->file_name=$arr[0];
                $resource->size=Storage::disk("public")->size($arr[1].$arr[0]);
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
            $resource=Resources::findOrFail($id);

            Storage::disk("public")->delete($resource->file_path.$resource->file_name);

            $resource->delete();

            return response()->json("Deleted Successfully", 200);
        }catch (\Exception $ex){
            return response()->json("Error", 404);
        }
    }
}
