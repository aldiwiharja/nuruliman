<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user_login = Auth::user();
        if ($user_login->role === "admin") {
            return $next($request);
        }else {
            return redirect('/')->with('harusadmin', 'anda bukan admin');
        }
    }
}
