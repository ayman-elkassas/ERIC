<?php

namespace App\Http\Controllers\Admin\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin;
use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    //
    final public function Register():object{
        return view('Admin.Authentication.Register');
    }

    public final function DoRegister(Request $request):object{
        try {
            $data = $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:admins|max:255',
                'password' => 'required|string|min:6',
                'avatar'=>'required'
            ], [], [
                'name' => trans('admin.register.name'),
                'email' => trans('admin.register.email'),
                'password' => trans('admin.register.password'),
                'avatar'=>''
                ]);

        } catch (ValidationException $e) {
            return response(['error'=>"Credentials invalid"],400);
        }

        //todo:Avatar
        $strpos=strpos($request->avatar,';');
        $sub=substr($request->avatar,0,$strpos);
        $ex=explode('/',$sub)[1];
        $name=time().'.'.$ex;
        $img=Image::make($request->avatar)->resize(350,350);
        $upload_path="/Admins/avatar/";
//        $img->save($upload_path.$name);

        //todo:after make link (php artisan storage:link) save as following
        Storage::disk("public")->put($upload_path.$name, (string) $img->encode(), 'public');

        //todo:create new object

        $user=new Admins();
        $user->name=ucwords(strtolower($request->name));
        $user->email=$request->email;
        $user->password=bcrypt($request->get('password'));
        $user->avatar="/Admins/avatar/".$name;
        $user->save();

        $role =Role::findOrCreate("admin","adminAuthGuard");
        $user->assignRole("admin");

        return response(['message'=>"User Created Successfully",'user'=>$user],200);

    }

}
