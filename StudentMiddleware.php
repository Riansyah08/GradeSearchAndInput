<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $request->validate = ([
            "NIM" => "required",
            "first_name" => "required",
            "last_name" => "required",
            "date_of_birth" => "required",
            "address" => "required"
        ]);

        return $next($request);
    }
}
