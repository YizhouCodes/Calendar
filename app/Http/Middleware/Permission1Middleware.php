<?php

namespace App\Http\Middleware;

use Auth;

use Closure;

class Permission1Middleware
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
        if (Auth::guest()) {
            return redirect('/');
        }
        $permission_granted = false;
        foreach ($request->user()->roles as $role) {
            if ($role->permissions->find(1)) {
                $permission_granted = true;
            }
        }
        if (!$permission_granted) {
            return redirect('/');
        }
        return $next($request);
    }
}
