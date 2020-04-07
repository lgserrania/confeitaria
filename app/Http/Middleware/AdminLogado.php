<?php

namespace App\Http\Middleware;

use Closure;

class AdminLogado
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
        if(!session()->get("usuario")){
            return redirect()->route("painel.login");
        }
        return $next($request);
    }
}
