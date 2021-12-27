<?php

namespace App\Http\Middleware;

use Closure;

class PeopleAuthenticate
{
    public function handle($request, Closure $next)
    {
        if (!session('people')) {
            return redirect()->route('signIn')->with('permission_denied', 'Permissão Negada');
        }

        return $next($request);
    }
}
