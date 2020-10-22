<?php

namespace App\Http\Controllers\Admin\Authentication;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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
            ], [], [
                'name' => trans('admin.register.name'),
                'email' => trans('admin.register.email'),
                'password' => trans('admin.register.password'),
            ]);

        } catch (ValidationException $e) {
            return response(['error'=>"Credentials invalid"],400);
        }

        $data['password']=bcrypt($request->get('password'));

        $user=Admins::create($data);

        return response(['message'=>"User Created Successfully",'user'=>$user],200);

    }

}
