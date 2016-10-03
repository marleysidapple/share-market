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
        if (!\Request::ajax()){
           if (Auth::user()->roles()->first()->name != "superadmin"){
            if (!Auth::user()->can(\Request::route()->getName())){
               return response()->view('errors.404');
            }
          }
        }
        return $next($request);
    }
}
