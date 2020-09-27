<?php

namespace App\Http\Controllers\Admin\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{
    //
    public final function ForgetPassword():object{
        return view('Admin.Authentication.ForgetPassword');
    }

    public final function DoForgetPassword():object{
        return view('Admin.Authentication.ForgetPassword');
    }
}
