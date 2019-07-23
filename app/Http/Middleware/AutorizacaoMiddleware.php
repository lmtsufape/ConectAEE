<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Notificacao;
use App\Aluno;
use App\Objetivo;
use App\Atividade;
use App\Sugestao;
use App\Gerenciar;

class AutorizacaoMiddleware
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



      if(Auth::guest()){

        return redirect('login');

      }else{

        $rotas_regras_notificacao = [
            'usuario/notificacao/{id_notificacao}/ler',
        ];

        $rotas_regras_completar_cadastro = [
            'usuario/completarCadastro',
        ];

        $rotas_regras_acessar_aluno = [
            'aluno/{id_aluno}/forum',
            'aluno/{id_aluno}/gerenciar',
            'aluno/{id_aluno}/objetivos/listar',
            'aluno/{id_aluno}/galeria,'
        ];

        $rotas_regras_administrador = [
          'aluno/{id_aluno}/objetivos/cadastrar',
          'aluno/{id_aluno}/gerenciar/permissoes',
          'aluno/{id_aluno}/gerenciar/permissoes/cadastrar',
        ];

        $rotas_regras_acessar_aluno_objetivo = [
          'aluno/{id_aluno}/objetivo/{id_objetivo}/forum',
          'aluno/{id_aluno}/objetivos/{id_objetivo}/gerenciar',
          'aluno/{id_aluno}/objetivos/{id_objetivo}/gerenciar/sugestoes/listar',
          'aluno/{id_aluno}/objetivos/{id_objetivo}/gerenciar/atividades/listar',
          'aluno/{id_aluno}/objetivos/{id_objetivo}/gerenciar/sugestoes/cadastrar',
        ];

        $rotas_regras_dono_objetivo = [
          'aluno/{id_aluno}/objetivos/{id_objetivo}/gerenciar/status/cadastrar',
          'aluno/{id_aluno}/objetivos/{id_objetivo}/gerenciar/concluir',
          'aluno/{id_aluno}/objetivos/{id_objetivo}/gerenciar/desconcluir',
          'aluno/{id_aluno}/objetivos/{id_objetivo}/gerenciar/atividades/cadastrar',
        ];

        $rotas_regras_cod_aluno = [
          'aluno/{cod_aluno}/gerenciar/permissoes/requisitar',
        ];

        $rotas_regras_administrador_remover = [
          'aluno/{id_aluno}/gerenciar/permissoes/{id_permissao}/remover',
        ];

        $rotas_regras_dono_objetivo_atividade = [
          'aluno/{id_aluno}/objetivos/{id_objetivo}/gerenciar/atividades/{id_atividade}/concluir',
          'aluno/{id_aluno}/objetivos/{id_objetivo}/gerenciar/atividades/{id_atividade}/desconcluir'
        ];

        $rotas_regras_acessar_objetivo_sugestao = [
          'aluno/{id_aluno}/objetivos/{id_objetivo}/gerenciar/sugestoes/{id_sugestao}/feedbacks/listar',
          'aluno/{id_aluno}/objetivos/{id_objetivo}/gerenciar/sugestoes/{id_sugestao}/feedbacks/cadastrar',
        ];

        $rotas_regras_acessar_aluno_notificacao = [
          'aluno/{id_aluno}/gerenciar/permissoes/notificacao/{id_notificacao}/conceder',
        ];

        if(in_array($request->route()->uri,$rotas_regras_notificacao)){

          $notificacao = Notificacao::find($request->route('id_notificacao'));

          if($notificacao == NULL || Auth::user()->id != $notificacao->destinatario_id){
              return redirect()->route("aluno.listar")->with('denied','Você não tem permissão para acessar esta página ou ela não existe.');
          }

        }else if(in_array($request->route()->uri,$rotas_regras_completar_cadastro)){

          if(Auth::user()->cadastrado != false){
              return redirect()->route("aluno.listar")->with('denied','Você não tem permissão para acessar esta página ou ela não existe.');
          }

        }else if(in_array($request->route()->uri,$rotas_regras_acessar_aluno)){

          $aluno = Aluno::find($request->route('id_aluno'));

          if($aluno == NULL){
            return redirect()->route("aluno.listar")->with('denied','Você não tem permissão para acessar esta página ou ela não existe.');
          }

          $gerenciar = Gerenciar::where('user_id','=',Auth::user()->id)
                                ->where('aluno_id','=',$aluno->id)->first();

          if($gerenciar == NULL){
            return redirect()->route("aluno.listar")->with('denied','Você não tem permissão para acessar esta página ou ela não existe.');
          }

        }else if(in_array($request->route()->uri,$rotas_regras_administrador)){

          $aluno = Aluno::find($request->route('id_aluno'));

          if($aluno == NULL){
            return redirect()->route("aluno.listar")->with('denied','Você não tem permissão para acessar esta página ou ela não existe.');
          }

          $gerenciar = Gerenciar::where('user_id','=',Auth::user()->id)
                                ->where('aluno_id','=',$aluno->id)->first();

          if($gerenciar == NULL || $gerenciar->isAdministrador == false){
            return redirect()->route("aluno.listar")->with('denied','Você não tem permissão para acessar esta página ou ela não existe.');
          }

        }else if(in_array($request->route()->uri,$rotas_regras_acessar_aluno_objetivo)){

          $aluno = Aluno::find($request->route('id_aluno'));
          $objetivo = Objetivo::find($request->route('id_objetivo'));

          if($aluno == NULL || $objetivo == NULL){
            return redirect()->route("aluno.listar")->with('denied','Você não tem permissão para acessar esta página ou ela não existe.');
          }

          $gerenciar = Gerenciar::where('user_id','=',Auth::user()->id)
                                ->where('aluno_id','=',$aluno->id)->first();

          if($gerenciar == NULL || $objetivo->aluno->id != $aluno->id){
            return redirect()->route("aluno.listar")->with('denied','Você não tem permissão para acessar esta página ou ela não existe.');
          }

        }else if(in_array($request->route()->uri,$rotas_regras_dono_objetivo)){

          $aluno = Aluno::find($request->route('id_aluno'));
          $objetivo = Objetivo::find($request->route('id_objetivo'));

          if($aluno == NULL || $objetivo == NULL){
            return redirect()->route("aluno.listar")->with('denied','Você não tem permissão para acessar esta página ou ela não existe.');
          }

          $gerenciar = Gerenciar::where('user_id','=',Auth::user()->id)
                                ->where('aluno_id','=',$aluno->id)->first();

          if($gerenciar == NULL || $objetivo->aluno->id != $aluno->id || $objetivo->user->id != Auth::user()->id){
            return redirect()->route("aluno.listar")->with('denied','Você não tem permissão para acessar esta página ou ela não existe.');
          }
        }else if(in_array($request->route()->uri,$rotas_regras_cod_aluno)){

          $aluno = Aluno::where('codigo','=',$request->route('cod_aluno'))->first();

          if($aluno == NULL){
              return redirect()->route("aluno.listar")->with('denied','Você não tem permissão para acessar esta página ou ela não existe.');
          }

        }else if(in_array($request->route()->uri,$rotas_regras_administrador_remover)){

          $aluno = Aluno::find($request->route('id_aluno'));

          if($aluno == NULL){
            return redirect()->route("aluno.listar")->with('denied','Você não tem permissão para acessar esta página ou ela não existe.');
          }

          $gerenciar = Gerenciar::where('user_id','=',Auth::user()->id)
                                ->where('aluno_id','=',$aluno->id)->first();

          $permissao = Gerenciar::find($request->route('id_permissao'));

          if($gerenciar == NULL || $permissao == NULL || $gerenciar->isAdministrador == false || $permissao->aluno->id != $aluno->id){
            return redirect()->route("aluno.listar")->with('denied','Você não tem permissão para acessar esta página ou ela não existe.');
          }

        }else if(in_array($request->route()->uri,$rotas_regras_dono_objetivo_atividade)){

          $aluno = Aluno::find($request->route('id_aluno'));
          $objetivo = Objetivo::find($request->route('id_objetivo'));
          $atividade = Atividade::find($request->route('id_atividade'));

          if($aluno == NULL || $objetivo == NULL || $atividade == NULL){
            return redirect()->route("aluno.listar")->with('denied','Você não tem permissão para acessar esta página ou ela não existe.');
          }

          $gerenciar = Gerenciar::where('user_id','=',Auth::user()->id)
                                ->where('aluno_id','=',$aluno->id)->first();

          if($gerenciar == NULL || $objetivo->aluno->id != $aluno->id || $objetivo->user->id != Auth::user()->id || $atividade->objetivo->id != $objetivo->id){
            return redirect()->route("aluno.listar")->with('denied','Você não tem permissão para acessar esta página ou ela não existe.');
          }
        }else if(in_array($request->route()->uri,$rotas_regras_acessar_objetivo_sugestao)){

          $aluno = Aluno::find($request->route('id_aluno'));
          $objetivo = Objetivo::find($request->route('id_objetivo'));
          $sugestao = Sugestao::find($request->route('id_sugestao'));

          if($aluno == NULL || $objetivo == NULL || $sugestao == NULL){
            return redirect()->route("aluno.listar")->with('denied','Você não tem permissão para acessar esta página ou ela não existe.');
          }

          $gerenciar = Gerenciar::where('user_id','=',Auth::user()->id)
                                ->where('aluno_id','=',$aluno->id)->first();

          if($gerenciar == NULL || $objetivo->aluno->id != $aluno->id || $sugestao->objetivo->id != $objetivo->id){
            return redirect()->route("aluno.listar")->with('denied','Você não tem permissão para acessar esta página ou ela não existe.');
          }
        }else if(in_array($request->route()->uri,$rotas_regras_acessar_aluno_notificacao)){

          $aluno = Aluno::find($request->route('id_aluno'));
          $notificacao = Notificacao::find($request->route('id_notificacao'));

          if($aluno == NULL || $notificacao == NULL){
            return redirect()->route("aluno.listar")->with('denied','Você não tem permissão para acessar esta página ou ela não existe.');
          }

          $gerenciar = Gerenciar::where('user_id','=',Auth::user()->id)
                                ->where('aluno_id','=',$aluno->id)->first();

          if($gerenciar == NULL || Auth::user()->id != $notificacao->destinatario_id || $notificacao->aluno->id != $aluno->id){
              return redirect()->route("aluno.listar")->with('denied','Você não tem permissão para acessar esta página ou ela não existe.');
          }

        }
      }

      return $next($request);
    }
}
