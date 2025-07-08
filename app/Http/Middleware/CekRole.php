<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role  // Parameter untuk menentukan role yang diizinkan (misal: 'admin')
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Middleware ini berasumsi pengguna SUDAH LOGIN.
        // Pengecekan login (auth) akan kita lakukan di file routes.

        // Cek apakah role pengguna tidak sesuai dengan yang dibutuhkan
        if (Auth::user()->role !== $role) {
            // Jika tidak sesuai, alihkan ke halaman home.
            // Anda bisa juga mengalihkannya ke halaman lain atau menampilkan error 403 (Forbidden).
            return redirect()->route('home');
        }

        // Jika role sesuai, lanjutkan ke halaman yang dituju
        return $next($request);
    }
}