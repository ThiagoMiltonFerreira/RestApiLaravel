<?php

namespace App\Http\Middleware;

use Closure;

class CheckProducts
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
        dd("estou no mid ");
        return $next($request);
    }
}
