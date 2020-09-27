<?php

namespace App\Http\Controllers\Admin\Authentication;

//todo:using
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public final function Login():object{
        return view("Admin.Authentication.Login");
    }

    public final function DoLogin():object{

        $remeberme= \request('rememberme')==1 ? true:false;

        if(FAdminAuthGuard()->attempt([
            'email'=>\request('email'),
            'password'=>\request('password')
        ],$remeberme)){
            //todo:done create session and reset it every 60 minute
            session()->flash('success','Admin Login Successfully');

            return redirect()
                ->to(FAdminUrl())
                ->with('Admin Login Successfully');
        }
        else {
            session()->flash('error','Admin Failed To Login');
            
            return redirect()
                ->to(FAdminAuthUrl('login'))
                ->with('Admin Failed To Login');
        }
    }

    public final function Logout():object {

        auth()->guard('adminAuthGuard')->logout();
        session()->flash('success','Admin Logout Successfully');

        return redirect()->to('auth/login');
    }
}
