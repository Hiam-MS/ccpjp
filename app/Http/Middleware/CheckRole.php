<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next , string $role)
    {
        if($role== 'persone' && auth()->user()->role != 'p')
        {
            abort(403);

        }

        if($role== 'company' && auth()->user()->role != 'c'){
            abort(403);

        }

        if($role== 'admin' && auth()->user()->role != 'a')
        {
            abort(403);

        }









        return $next($request);
    }
}
