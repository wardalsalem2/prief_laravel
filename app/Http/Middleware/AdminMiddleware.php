<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // التحقق مما إذا كان المستخدم مسجّل دخولًا وكان دوره 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // إعادة التوجيه إذا لم يكن المستخدم مسؤولًا
        return redirect('/')->with('error', 'ليس لديك صلاحية الوصول إلى هذه الصفحة.');
    }
}
