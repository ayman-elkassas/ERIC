<?php

namespace App\Http\Controllers\Admin\FieldManagment;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use App\Models\Category;
use App\Models\Field;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class FieldController extends Controller
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
            $all_fields = Field::with(['categoryRelated','userFollow'=>function($query){
                $query->select('fname', 'lname','email','avatar');
            }])->get();
            foreach ($all_fields as $field) {
                try {
                    $val=imageToStreamBase64($field->userFollow()->get()[0]->avatar);
                    $avatar[$field->categoryRelated()->get()[0]->user_id]=$val;
                }catch (\Exception $ex){
                    continue;
                }
            }

            $all_fields->push($avatar);

            return response()->json($all_fields, 200);
        }catch (\Exception $ex){
            return response()->json($ex, 404);
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
            $field=new Field();
            $field->name=$request->get("fieldName");
            $field->category_id=(int)$request->get("categoryId");

            $field->save();

            //todo:option for logic
            $field->userFollow()->attach((int)$request->get("Uid"));

            return response()->json($field, 200);
        }catch (\Exception $ex){
            return response()->json($ex, 404);
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
            $field=Field::findOrFail($id);
//            $field->userFollow()->detach();

            $field->name=$request->get("fieldName");
            $field->category_id=(int)$request->get("categoryId");

            $field->save();

//            $field->userFollow()->attach((int)$request->get("Uid"));

            return response()->json($field, 200);
        }catch (\Exception $ex){
            return response()->json($ex, 404);
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
            Field::findOrFail($id)->delete();

            return response()->json("Deleted Successfully", 200);
        }catch (\Exception $ex){
            return response()->json("Error", 404);
        }
    }
}
