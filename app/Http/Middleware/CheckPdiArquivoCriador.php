<?php

namespace App\Http\Middleware;

use App\pdiArquivo;
use Closure;
use App\Pdi;
use Illuminate\Support\Facades\Auth;

class CheckPdiArquivoCriador
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

        $pdi = pdiArquivo::find($request->route('id_pdiArquivo'));

        if($pdi == NULL || $pdi->user_id != Auth::user()->id){
            return redirect("/")->with('denied','Você não tem permissão para acessar esta página ou ela não existe.');
        }

        return $next($request);
    }
}
