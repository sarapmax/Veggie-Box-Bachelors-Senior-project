<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfFarmerNotActivated
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
        if(!auth()->guard($guard)->user()->activated) {
            auth()->guard($guard)->logout();
            return redirect('farmer/login')->with('error-login', 'คุณยังไม่ได้รับการยืนยันจาก Admin');
        }

        return $next($request);
    }
}
