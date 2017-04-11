<?php

namespace App\Http\Middleware;

use Auth;

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
    public function handle($request, Closure $next)
    {
        if (Auth::guest() || $request->user()->roles->find(1) == null) {
            return redirect('/');
        }
        return $next($request);
    }
}
