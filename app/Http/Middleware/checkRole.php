<?php

namespace App\Http\Middleware;

use Closure;

class checkRole
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
        if( auth()->check() && $request->user()->type =='admin' ) {
            return $next($request);
        } else if( auth()->check() && $request->user()->type =='teacher' ){
            return $next($request);
        }else if( auth()->check() && $request->user()->type =='member' ){
            return $next($request);
        }else if( auth()->check() && $request->user()->type =='waitTeacher' ){
            return $next($request);
        }
        abort(403, 'Unauthorized action.');

    }
}
