<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
 
class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next,$guard = null)
    {

        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {

               return redirect()->route('login');
            }
        }else{
            if( \Auth::User()->role =="user" && Auth::user()->status == 1){                       
                return $next($request);
            }
        }
        return redirect()->route('login');

    }
     
}
