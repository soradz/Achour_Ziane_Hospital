<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckLogin
{
    public function handle(Request $request, Closure $next)
    {
        // إذا ما كانش المستخدم مسجّل دخول
        if (!Session::has('user_id')) {
            return redirect('/login');
        }

        return $next($request);
    }
}
