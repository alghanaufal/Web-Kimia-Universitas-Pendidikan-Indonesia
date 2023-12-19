<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if ($request->user()->role !== $role) {
            return redirect()->back()->with('error', 'Anda tidak memiliki hak akses untuk mengakses halaman tersebut.');
        }

        return $next($request);
    }
}
