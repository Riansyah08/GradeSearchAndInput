<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GradeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $request->validate = ([
            'std_grade' => 'required',
            'major_name',
            'NIM',
            'first_name',
            'last_name',
            'course_name'
        ]);

        return $next($request);
    }
}
