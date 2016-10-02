<?php

namespace App\Http\Middleware;

use Closure;
use Gate;

class RedirectIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Gate::allows('admin'))
            return redirect()->route('admin');
        return $next($request);
    }
}
