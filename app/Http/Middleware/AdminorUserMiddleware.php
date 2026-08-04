<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOrUserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('admin')->check() || Auth::guard('web')->check()) {
            return $next($request);
        }

        return redirect()->back()->with('error', 'Access denied. Admins or Users only.');
    }
}
