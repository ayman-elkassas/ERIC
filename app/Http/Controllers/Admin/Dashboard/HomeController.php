<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;
use Tymon\JWTAuth\Facades\JWTAuth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth')->only('index');

        //todo:should insert in constructor of controller to auth with provider
        Config::set('jwt.user', Admins::class);
        Config::set('auth.providers', ['users' => [
            'driver' => 'eloquent',
            'model' => Admins::class,
        ]]);

    }

    public final function index(Request $request):object
    {
        return view('Admin.Home.Dashboard');
    }

    public final function getUser(Request $request):object
    {
        $user = auth()->user();
        $user['role']=$user->getRoleNames();

        // encode image as data-url
        $user->avatar = imageToStreamBase64($user->avatar);

        return response()->json([
            'user' => $user
        ], 200);
    }
}
