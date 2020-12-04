<?php

namespace App\Http\Controllers\Admin\AdminMembers;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

    public function __construct()
    {
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //
        try {
            $all_users_with_all_their_roles = Admins::with('roles')->get();
            foreach ($all_users_with_all_their_roles as $user) {
                $user->avatar=imageToStreamBase64($user->avatar);
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

            $user=Admins::findOrFail($id);

            if($request->name!==""){
                $user->name=$request->name;
                $user->email=$request->email;

                $roles=(array)json_decode($request->roles,true);
                $user->syncRoles($roles);

                if($request->avatar!==""){
                    //todo:Avatar
                    $strpos=strpos($request->avatar,';');
                    $sub=substr($request->avatar,0,$strpos);
                    $ex=explode('/',$sub)[1];
                    $name=time().'.'.$ex;
                    $img=Image::make($request->avatar)->resize(350,350);
                    $upload_path="/Admins/avatar/";
                    //todo:after make link (php artisan storage:link) save as following
                    Storage::disk("public")->put($upload_path.$name, (string) $img->encode(), 'public');

                    $user->avatar="/Admins/avatar/".$name;
                }

                $user->save();
            }

            return response()->json($user, 200);
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
            Admins::findOrFail($id)->delete();

            return response()->json("Deleted Successfully", 200);
        }catch (\Exception $ex){
            return response()->json("Error", 404);
        }
    }
}
