<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticatedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário está na sessão
        if (!session()->has('user')) {
           
            // Redireciona para a página de login se não estiver autenticado
            return redirect('/login')->with('error', 'Você precisa estar logado para acessar esta página.');
        }

        return $next($request);
    }
}