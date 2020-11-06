<?php

namespace App\Http\Controllers\Admin\PermissionManagement;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionManagement extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all_permission_in_database = Permission::all();
        return response()->json($all_permission_in_database, 200);
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
        $permission_name=cleanString($request->permission_name);

        $role = Permission::create(['name' => $permission_name,
            "guard_name"=>$request->guard_name]);
        return response()->json("Done Created Permission Successfully", 200);
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
        try{
            $permission_name=cleanString($request->permission_name);
            $permission=Permission::findOrFail($id);

            $permission->name=$permission_name;
            $permission->guard_name=$request->guard_name;
//
            $permission->save();

            return response()->json("Update Successfully", 200);
        }catch (\Exception $ex){
            return response()->json($permission, 404);
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
            $permission=Permission::findOrFail($id)->delete();

            return response()->json("Delete Successfully", 200);
        }catch (\Exception $ex){
            return response()->json($permission, 404);
        }
    }
}
