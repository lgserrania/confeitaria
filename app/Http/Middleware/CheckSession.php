<?php

namespace App\Http\Middleware;

use Closure;
use App\Classes\ClassCarrinho;

class CheckSession
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
        if(!session()->get("carrinho")){
            session(['carrinho' => new ClassCarrinho()]);
        }
        return $next($request);
    }
}
