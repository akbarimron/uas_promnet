<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): mixed
    {
        \Log::info('RedirectIfAuthenticated middleware check', [
            'path' => $request->path(),
            'auth_check' => Auth::check(),
            'auth_id' => Auth::id(),
            'session_id' => session()->getId(),
        ]);

        if (Auth::check()) {
            \Log::info('User authenticated, redirecting to dashboard');
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
