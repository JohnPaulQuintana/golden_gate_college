<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $userRole = $request->user()->role;
        // Define the valid roles and their respective dashboard routes using model constants
        $roles = [
            'admin' => User::ADMIN,
            'student' => User::STUDENT,
            'teacher' => User::TEACHER,
        ];

        
        return $next($request);
    }
}
