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
        
        if (!Auth::user()->can(\Request::route()->getName())){
           return response()->view('errors.404');
        }
        return $next($request);
    }
}
