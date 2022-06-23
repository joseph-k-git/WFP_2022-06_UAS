<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            //return redirect(RouteServiceProvider::HOME);
            $role = Auth::user()->sebagai;
            
            switch ($role) {
                case 'admin':
                    return '/controlpanel';
                    break;
                case 'buyer':
                    return '/home';
                    break;
                default:
                    return '/';
                    break;
            }            
        }

        return $next($request);
    }
}
