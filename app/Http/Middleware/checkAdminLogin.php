<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkAdminLogin
{
    const ROLE_ADMIN = 2;
    const ACTIVE     = 1;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       // nếu user đã đăng nhập
       if (Auth::check()) {
           $user = Auth::user();
           if ($user->role == self::ROLE_ADMIN && $user->status = self::ACTIVE) {
               return $next($request);
           } else {
               return redirect()->route('contact');
           }
       } else {
            return redirect('/login');
       }
    }
}
