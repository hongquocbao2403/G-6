<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminTypeMiddleware
{
    public function handle(Request $request, Closure $next, $type)
    {
        if (Auth::check() && Auth::user()->role === $type) {
            return $next($request);
        }

        return redirect('/');
    }
}

