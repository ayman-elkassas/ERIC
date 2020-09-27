<?php

namespace App\Http\Controllers\Admin\Authentication;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    //
    final public function Register():object{
        return view('Admin.Authentication.Register');
    }

    final public function DoRegister(Request $request):object{
        //todo:make validation step
        try {
            $data = $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:admins',
                'password' => 'required|min:6',
            ], [], [
                'name' => trans('admin.register.name'),
                'email' => trans('admin.register.email'),
                'password' => trans('admin.register.password'),
            ]);
        } catch (ValidationException $e) {
        }

        $data['password']=bcrypt($request->get('password'));
        Admins::create($data);

        session()->flash('success',trans('admin.register.flash_message'));

        return redirect(FAdminUrl());
    }

}
