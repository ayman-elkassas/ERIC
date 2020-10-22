<?php

namespace App\Http\Controllers\Admin\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin;
use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Facades\Image;

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
        $img=Image::make($request->avatar)->resize(300,300);
        $upload_path=public_path("Admin")."/avatar/";
        $img->save($upload_path.$name);

        //todo:create new object

        $user=new Admins();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->get('password'));
        $user->avatar="Admin/avatar/".$name;
        $user->save();

        $user->assignRole("admin");

        return response(['message'=>"User Created Successfully",'user'=>$user],200);

    }

}
