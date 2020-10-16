<?php

namespace App\Http\Controllers\Admin\Authentication;

//todo:using
use App\Http\Controllers\Controller;
use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    public function __construct()
    {
        //todo:should change provider and then implement JWTSubject
        Config::set('jwt.user', Admins::class);
        Config::set('auth.providers', ['users' => [
            'driver' => 'eloquent',
            'model' => Admins::class,
        ]]);
    }

    public final function Login():object{
        return view("Admin.Authentication.AdminAuth");
    }

    public final function DoLogin(Request $request){

        $credential=$request->only('email','password');

        if(!$token=JWTAuth::attempt($credential)){
            return ['error'=>'invalid_credentials'];
        }
        else
        {
            $user = JWTAuth::user();
            $provider="admins";
            return ['token'=>$token,'user'=>$user,"provider"=>$provider];
        }
    }

    public final function Logout(Request $request):object {

        return response()->json(FAdminAuthGuard()->user());
        FAdminAuthGuard()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });

        //todo:for clear session
        FAdminAuthGuard()->logout();

        return response()->json('Logged out successfully',200);
    }
}

//todo:Methwada
// How to call any api from backend
// $http=new \GuzzleHttp\Client;
// $response=$http->post(config('services.passport.login_endpoint'),[
//                'form_params'=>[
//                    'grant_type'=>config('services.passport.grant_type'),
//                    'client_id'=>config('services.passport.client_id'),
//                    'client_secret'=>config('services.passport.client_secret'),
//                    'username'=>$request->username,
//                    'password'=>$request->password,
//                    'provider'=>$request->provider,
//                ]
//            ]);
// return $response->getBody();
