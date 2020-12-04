<?php

namespace App\Http\Controllers\Admin\UserMembers;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use App\Models\Prefer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Facades\Image;

class UserController extends Controller
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
            $all_users_with_all_their_roles = User::with('roles')->get();
            foreach ($all_users_with_all_their_roles as $user) {
                try {
                    $user->avatar=imageToStreamBase64($user->avatar);
                }catch (\Exception $ex){
                    continue;
                }
            }
            return response()->json($all_users_with_all_their_roles, 200);
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

            try {
                $data = $this->validate($request, [
                    'fname' => 'required|string|max:255',
                    'lname' => 'required|string|max:255',
                    'email' => 'required|email|unique:admins|max:255',
                    'password' => 'required|string|min:6',
                    'avatar'=>'required',
                    'phone'=>'required',
                    'fields'=>'required',
                    'skills'=>'required'
                ], [], [
                    'name' => trans('admin.register.name'),
                    'email' => trans('admin.register.email'),
                    'password' => trans('admin.register.password'),
                    'avatar'=>'',
                    'phone'=>'',
                    'fields'=>'',
                    'skills'=>''
                ]);

            } catch (ValidationException $e) {
                return response(['error'=>"Credentials invalid"],400);
            }

            //todo:Avatar
            if($request->avatar!==""){
                //todo:Avatar
                $strpos=strpos($request->avatar,';');
                $sub=substr($request->avatar,0,$strpos);
                $ex=explode('/',$sub)[1];
                $name=time().'.'.$ex;
                $img=Image::make($request->avatar)->resize(350,350);
                $upload_path="/Users/avatar/";
                //todo:after make link (php artisan storage:link) save as following
                Storage::disk("public")->put($upload_path.$name, (string) $img->encode(), 'public');
            }

            //todo:create new object

            $user=new User();
            $user->fname=ucwords(strtolower($request->fname));
            $user->lname=ucwords(strtolower($request->lname));
            $user->email=$request->email;
            $user->phone=$request->phone;
            $user->skills="";
            $user->fields_follow="";
            if(is_array($request->skills) && is_array($request->fields))
            {
                foreach ($request->skills as $skill){
                    $user->skills=$user->skills.$skill["name"].',';

                }

                foreach ($request->fields as $field){
                    $user->fields_follow=$user->fields_follow.$field["name"].',';
                }
            }
            $user->password=bcrypt($request->get('password'));
            $user->avatar="/Users/avatar/".$name;
            $user->save();

            $temp=User::findOrFail($user->id);
            foreach ($request->skills as $skill){
                $user->OwnSkills()->attach($skill["id"]);
            }

            foreach ($request->skills as $field){
                $user->fieldsFollowing()->attach($field["id"]);
            }

            return response()->json($user, 200);
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
