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

    /**
     * @var \Tymon\JWTAuth\JWTAuth
     */
    protected $jwt;

    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;

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

        $user=\auth()->user();
        try {
            \auth()->logout();
            return response()->json([
                'message' => $user->name
            ], 200);

        }catch (\Exception $ex){
            return response()->json([
                'message' => 'Failed to logout user. Try again.'
            ], 500);
        }

    }
}
