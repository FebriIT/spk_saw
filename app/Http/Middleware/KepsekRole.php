<?php

namespace App\Http\Middleware;

use Closure;

class KepsekRole
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
        if(\Auth::user()->role === 'Kepsek') {
            return $next($request);
        }

        return redirect('restricted-page');
    }
}
