<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAccessLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next, $level)
    {
        // Verifica se o usuário está autenticado
        if (!Auth::check()) {
            return redirect('/login');
        }
        $userLevel = Auth::user()->access_level;

        // Verifica o nível de acesso do usuário
        if ($userLevel > $level) {
            return abort(403, 'Acesso não autorizado.');
        }
        return $next($request);
    }
}
