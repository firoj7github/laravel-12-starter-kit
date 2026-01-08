<?php

namespace App\Http\Middleware\admin;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminLoginGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // User already logged in
        if (Auth::check()) {

            // If user is not admin → logout and redirect to login
            if (Auth::user()->role_id != 1) {
                Auth::logout();
                return redirect()->route('admin.login')
                    ->with('error', 'Unauthorized access!');
            }

            // Admin logged in → redirect to dashboard
            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    }
}
