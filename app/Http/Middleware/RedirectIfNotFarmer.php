<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotFarmer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'farmer')
    {
        if(!auth()->guard($guard)->check()) {
            return redirect('farmer/login');
        }

        return $next($request);
    }
}
