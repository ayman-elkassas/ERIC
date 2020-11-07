<?php

namespace App\Http\Controllers\Admin\RoleManagement;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Spatie\Permission\Models\Role;

class RoleManagement extends Controller
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
        $all_roles_in_database = Role::all();
        return response()->json($all_roles_in_database, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $guards=config('auth.guards');
        $guards_name=array_keys($guards);

        return response()->json($guards_name, 200);

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
        $role_name=cleanString($request->role_name);

        $role = Role::create(['name' => $role_name,
            "guard_name"=>$request->guard_name]);
        return response()->json("Done Created Role Successfully", 200);
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
            $role_name=cleanString($request->role_name);
            $role=Role::findOrFail($id);

            $role->name=$role_name;
            $role->guard_name=$request->guard_name;
//
            $role->save();

            return response()->json("Update Successfully", 200);
        }catch (\Exception $ex){
            return response()->json($role, 404);
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
            $role=Role::findOrFail($id)->delete();

            return response()->json("Delete Successfully", 200);
        }catch (\Exception $ex){
            return response()->json($role, 404);
        }
    }
}
