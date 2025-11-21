<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            abort(403);
        }

        $user = Auth::user();

        if (!$user || !in_array($user->role, $roles)) {
            abort(403);
        }

        return $next($request);
    }
}
