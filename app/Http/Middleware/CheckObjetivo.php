<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Objetivo;
use App\Models\Gerenciar;

class CheckObjetivo
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
      }else if(Auth::user()->cadastrado == false){
        return redirect()->route('usuario.completarCadastro');
      }

      $objetivo = Objetivo::find($request->route('id_objetivo'));

      if($objetivo == NULL){
        return redirect("/")->with('denied','Você não tem permissão para acessar esta página ou ela não existe.');
      }

      $gerenciar = Gerenciar::where('user_id','=',Auth::user()->id)->where('aluno_id','=',$objetivo->aluno->id)->first();

      if($gerenciar == NULL){
        return redirect("/")->with('denied','Você não tem permissão para acessar esta página ou ela não existe.');
      }

      return $next($request);
    }
}
