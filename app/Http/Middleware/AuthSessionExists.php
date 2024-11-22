<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthSessionExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('api.login');
        }

        if (!session()->has('access_token') || !session()->has('user')) {
            return redirect()->route('api.login');
        }

        $user = session('user');
        if (!isset($user['role']) || !is_array($user['role']) || empty($user['role'])) {
            return redirect()->route('api.login');
        }

        $roles = array_map(function ($role) {
            return $role['name'];
        }, $user['role']);

        // Menyimpan roles dalam request untuk digunakan di route atau controller
        $request->merge(['user_roles' => $roles]);

        return $next($request);
    }
}