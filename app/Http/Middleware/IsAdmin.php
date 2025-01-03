<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::user()->is_admin != 1) {
            return abort(403, 'فقط المسؤولون يمكنهم الوصول إلى هذه الصفحة');
        }
        if (session()->has('user')) {
            return $next($request);
        }
        if (!Auth::check()) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
