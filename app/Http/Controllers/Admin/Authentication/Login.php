<?php

namespace App\Http\Controllers\Admin\Authentication;

use App\Http\Controllers\Controller;

class Login extends Controller
{

    public final function Login():object{
        return view("admin.Authentication.Login");
    }

    public final function doLogin():object{

        $remeberme= \request('rememberme')==1 ? true:false;

        if(auth()->guard('adminAuthGuard')->attempt([
            'email'=>\request('email'),
            'password'=>\request('password')
        ],$remeberme)){
            return redirect()->to('/admin/');
        }
        else {
            session()->flash('error','error in login');
            return redirect()->to('/auth/login')->send();
        }
    }

    public final function Logout():object {
        auth()->guard('adminAuthGuard')->logout();
        return redirect('auth/login');
    }
}
