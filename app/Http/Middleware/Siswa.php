<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Siswa
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
        if (Auth::check()) {
            if ($user_login->role === "siswa") {
                return $next($request);
            }else {
                return redirect('/admin/login');
            }
        }else {
            return $next($request);
        }
    }
}
