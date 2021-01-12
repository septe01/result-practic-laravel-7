<?php

namespace App\Http\Middleware;


use Closure;
use Auth; //panggil class Auth

class Admin
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

        if (Auth::check() && Auth::user()->level === 'Admin') {
            return $next($request);
        }
        abort(403);


        //     // if (!Auth::user()->level === 'Admin') {
        //     //     return redirect()->back();
        //     // }
        //     // return $next($request);
    }
}
