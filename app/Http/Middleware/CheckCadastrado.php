<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckCadastrado
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
      if(!Auth::check()){
        return redirect('/')->with('denied', 'É necessário estar logado para acessar o sistema');
      }else if(Auth::user()->ativo == false){
        return redirect()->route('usuario.completarCadastro');
      }else{
        return $next($request);
      }
    }
}
