<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Pdi;
use Illuminate\Support\Facades\Auth;

class CheckPdiCriador
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

        $pdi = Pdi::find($request->route('id_pdi'));

        if($pdi == NULL || $pdi->user_id != Auth::user()->id){
            return redirect("/")->with('denied','Você não tem permissão para acessar esta página ou ela não existe.');
        }

        return $next($request);
    }
}
