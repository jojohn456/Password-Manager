<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnVerifiedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            abort(403, 'Unauthorized action.');
        } else if (Auth::user()->role_id != 0) {

            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
