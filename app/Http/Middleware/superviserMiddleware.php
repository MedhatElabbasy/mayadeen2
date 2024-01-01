<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class superviserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // && auth()->user()->hasRole('supervisor')
        if (auth()->check() && auth()->user()->hasRole('supervisor')) {
            return $next($request);
        } else {
            return redirect()->route('supervisor.showLogin');
        }

    }
}