<?php

namespace App\Http\Controllers\Admin\AdminMembers;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class NormalAdminController extends Controller
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

    public function getRoleNames(){
        $all_roles_name_in_database = Role::all("name","guard_name");
        return response()->json($all_roles_name_in_database, 200);
    }

    public function RemoveAllRolls () {
        Artisan::call("migrate:refresh --path=/database/migrations/2020_09_26_185742_create_admins_table.php");

        $user=new Admins();
        $user->name=ucwords(strtolower("Ayman Elkassas"));
        $user->email="admin@eric.com";
        $user->password=bcrypt("123456");
        $user->avatar="/Admins/avatar/admin.png";
        $user->save();

        $user->assignRole("super_admin");

        if(Admins::all()->isEmpty()){
            return response()->json("Done Deleted All Rolls", 200);
        }
        else{
            return response()->json("error", 400);
        }
    }
}
