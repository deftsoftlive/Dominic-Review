<?php

namespace App\Http\Middleware;

use Closure;

class Checkout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
         

        if( \Auth::check() && \Auth::User()->role =="user" && Auth::user()->status == 1 && Auth::user()->CartItems->count() > 0){                       
                return $next($request);
        }else{
            return redirect()->route('my_cart')->with('errors','you have not any item in your cart.');
        }
    }
}
