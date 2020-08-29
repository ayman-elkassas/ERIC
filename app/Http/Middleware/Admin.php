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
//        dd($request);
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }
        else{
            return redirect('/home');
        }
    }
}
