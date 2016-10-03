<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Entrust;

class Able
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
<<<<<<< HEAD
        if (!\Request::ajax()){
           if (Auth::user()->roles()->first()->name != "superadmin"){
=======
        if (/*!\Request::ajax()*/ Auth::user()->roles()->first()->name != "superadmin"){
>>>>>>> c37c6120ae460a4d617edbe194f5952839b10937
            if (!Auth::user()->can(\Request::route()->getName())){
               return response()->view('errors.404');
            }
          }
        }
        return $next($request);
    }
}
