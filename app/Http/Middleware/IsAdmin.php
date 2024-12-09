<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        // Get the logged-in user's ID
        $userId = Auth::id();

        // Fetch the user's roles using Query Builder
        $roles = DB::connection('portal_santri')
            ->table('roles')
            ->join('user_role', 'roles.id', '=', 'user_role.role_id')
            ->where('user_role.user_id', $userId)
            ->pluck('roles.name') // Assuming the roles table has a `name` column
            ->toArray();

        // Check if the user has an admin or superadmin role
        if (!in_array('admin', $roles) && !in_array('superadmin', $roles)) {
            abort(403, 'فقط المسؤولون يمكنهم الوصول إلى هذه الصفحة'); // Only admins can access
        }

        return $next($request);
    }
}
