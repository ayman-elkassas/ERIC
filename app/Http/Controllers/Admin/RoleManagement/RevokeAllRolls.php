<?php

namespace App\Http\Controllers\Admin\RoleManagement;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RevokeAllRolls extends Controller
{
    //
    public function __construct()
    {
        //todo:should insert in constructor of controller to auth with provider
        Config::set('jwt.user', Admins::class);
        Config::set('auth.providers', ['users' => [
            'driver' => 'eloquent',
            'model' => Admins::class,
        ]]);

    }

    public function RemoveAllRolls () {
        Artisan::call("migrate:refresh --path=/database/migrations/2020_10_22_092830_create_permission_tables.php");

        //Todo:Reassign role to main account "Ayman Elkassas" as super admin
        Role::create(['name' => 'super_admin',
            "guard_name"=>"adminAuthGuard"]);

        $user=DB::table('admins')->
        where("email","=","admin@eric.com")->get()->first();

        auth()->user()->syncRoles(['super_admin']);

        if(Role::all()->isEmpty()){
            return response()->json("Done Deleted All Rolls", 200);
        }
        else{
            return response()->json("error", 400);
        }
    }
}
