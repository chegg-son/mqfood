<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isSupplier
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->is_admin != 3) {
            abort(403, 'فقط المسؤولون يمكنهم الوصول إلى هذه الصفحة');
        }

        if (!Auth::check() || Auth::user()->is_admin == null) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
