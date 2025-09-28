<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();
        // Debug temporaire : décommenter pour voir l'utilisateur courant
        // dd($user, $roles);
        if (!$user) {
            abort(403, 'Vous devez être connecté pour accéder à cette page.');
        }
        if (!in_array($user->role, $roles, true)) {
            abort(403, "Accès refusé. Votre rôle ({$user->role}) n'est pas autorisé pour cette page.");
        }
        return $next($request);
    }
}
