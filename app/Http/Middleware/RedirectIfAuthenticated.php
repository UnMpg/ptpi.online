<?php

namespace App\Http\Middleware;

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
        if (auth('admin')->check()) {
            return redirect(action('DashboardController@index'));
        } elseif (auth('participant')->check()) {
            return redirect(action('AuthController@registerConfirmation'));
        } elseif (auth('web')->check()) {
            return redirect(action('DashboardController@index'));
        }

        return $next($request);
    }
}
