<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->get('is_admin')) {
            return redirect()->route('login')->with('error', 'Доступ запрещён. Требуются права администратора.');
        }

        return $next($request);
    }
}