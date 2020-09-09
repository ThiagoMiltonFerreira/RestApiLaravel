<?php

namespace App\Http\Middleware;

use Closure;

class TesteMiddlewareGlobal
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
        //dd('Middleware global executta em cada solicitaçao HTTP do COD');
        echo "Middleware global executta em cada solicitaçao HTTP do COD AA";
        return $next($request);
    }
}
