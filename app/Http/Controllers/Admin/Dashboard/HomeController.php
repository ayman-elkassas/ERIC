<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public final function index():object
    {
        return view('Admin.Home.Dashboard');
    }
}
