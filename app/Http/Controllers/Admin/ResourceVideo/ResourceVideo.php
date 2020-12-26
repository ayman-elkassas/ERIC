<?php

namespace App\Http\Controllers\Admin\ResourceVideo;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use App\Models\Resources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ResourceVideo extends Controller
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
                ->where("type","=","4")
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
