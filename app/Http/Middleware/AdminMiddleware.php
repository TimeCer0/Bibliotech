<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        // Verifica si el usuario está autenticado y si tiene el user_type 'Admin'
        if (Auth::check() && Auth::user()->user_type === 'Admin') {
            return $next($request);
        }

        // Redirige o muestra una página de error si no es un administrador
        return redirect('/biblioteca')->with('error', 'You do not have admin access');
    }
}
