<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Tymon\JWTAuth\JWTAuth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth')->only('index');

        Config::set('jwt.user', Admins::class);
        Config::set('auth.providers', ['users' => [
            'driver' => 'eloquent',
            'model' => Admins::class,
        ]]);
    }

    public final function index():object
    {
        return view('Admin.Home.Dashboard');
    }

    public final function getUser(Request $request):object
    {
        $user = auth()->user();

        return response()->json([
            'user' => $user
        ], 200);
    }
}
