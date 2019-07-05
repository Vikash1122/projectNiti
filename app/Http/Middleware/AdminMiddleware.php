<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
       // print_r($guard);die();
        if(!auth()->guard($guard)->check()){
            return redirect('/admin/dashboard');
        }
        return $next($request);
    }
}
