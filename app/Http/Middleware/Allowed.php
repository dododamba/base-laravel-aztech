<?php

namespace App\Http\Middleware;

use Closure;

class Allowed
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
       return !Auth::guard('web')
                            ->check() ? 
                            redirect()->route('login') :  $next($request);
    }
}
