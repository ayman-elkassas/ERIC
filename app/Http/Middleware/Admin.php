<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next=null,$guard=null)
    {
        $guardName="adminAuthGuard";

//        dd(Auth::guard($guard)->check());
        if (auth()->guard($guardName)->check()) {
            return $next($request);
        }
        else{
//            dd(auth()->guard('adminAuthGuard')->check());
            return redirect()->to('auth/login')->send();
        }

    }
}
