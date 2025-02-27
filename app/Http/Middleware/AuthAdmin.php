<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Ganti kondisi ini sesuai dengan logika autentikasi admin Anda
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect('/'); // Redirect ke halaman yang sesuai jika bukan admin
        }

        return $next($request);
    }
}
