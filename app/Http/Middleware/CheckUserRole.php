<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserRole
{
    public function handle($request, Closure $next, $role)
    {
        if ($request->user() && $request->user()->role === $role) {
            return $next($request);
        }

        return redirect('/'); // Ganti dengan rute atau tindakan yang sesuai jika akses ditolak
    }
}

