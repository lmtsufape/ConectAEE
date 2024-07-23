<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Gerenciar;

class CheckGerenciaAdministrador
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

      $gerenciar = Gerenciar::find($request->route('id_permissao'));

      $aluno = $gerenciar->aluno;

      $gerenciar = Gerenciar::where('user_id','=',Auth::user()->id)->where('aluno_id','=',$aluno->id)->first();

      if($gerenciar == NULL || $gerenciar->tipoUsuario != 3){
        return redirect("/")->with('denied','Você não tem permissão para acessar esta página ou ela não existe.');
      }

      return $next($request);
    }
}
