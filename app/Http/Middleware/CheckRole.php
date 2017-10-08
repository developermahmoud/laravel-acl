<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        if(auth()->user() === null) {
            return response("Insufficient Permission", 401);
        }

        $actions = route()->getAction();

        $roles = isset($actions['roles']) ? $actions['roles'] : null;

        if( auth()->user()->hasAnyRoles($roles) || !$roles) {
            return $next($request);
        }

        return response("Insufficient Permission", 401);

    }
}
