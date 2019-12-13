<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Requests;
use Auth;
class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
        if (!Auth::guard($guard)->check()) {
           return redirect()->route('login_path_admin');
        }
        if ((Auth::guard($guard)->user()->lock_admin == 1)){
            return redirect()->route('lock_tai_khoan');
        }
            return $next($request);

    }
}
