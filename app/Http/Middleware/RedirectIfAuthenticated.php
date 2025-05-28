<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $user = Auth::user();

        if ($user) {
            switch ($user->role) {
                case 'admin':
                    return redirect('/admin/dashboardadmin');
                case 'guru':
                    return redirect('/guru/dashboardguru');
                case 'murid':
                    return redirect('/murid/dashboardmurid');
                default:
                    return redirect('/'); 
            }
        }

        return $next($request);
    }
}