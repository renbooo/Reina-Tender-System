<?php

namespace App\Http\Middleware;

use Closure;

class SessionUser
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
        if(auth()->check() && $request->user()->level == 'Admin'){
            return $next($request);
        }
        
        return redirect()->intended('/');
    }
}
