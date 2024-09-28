<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!$request->has('user_roles')) {
            return redirect()->route('api.login');
        }

        $userRoles = $request->user_roles;

        // Memeriksa apakah ada intersection antara role yang diizinkan dan role pengguna
        if (count(array_intersect($userRoles, $roles)) > 0) {
            return $next($request);
        }

        // Redirect ke halaman tidak diizinkan jika tidak ada role yang sesuai
        return redirect()->route('home');
    }
}
