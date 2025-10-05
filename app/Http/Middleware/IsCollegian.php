<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsCollegian
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if (Auth::user()->role!='collegian' && Auth::user()->role=='admin') {
            return redirect()->route('home');
        }
        if (Auth::user()->role!='collegian' && Auth::user()->role=='professor') {
            return redirect()->route('professor.courses');
        }
        return $next($request);
    }
}
