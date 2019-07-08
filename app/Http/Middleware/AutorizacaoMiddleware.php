<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Notificacao;
use App\Aluno;
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

        $rotas_regras_completarCadastro = [
            'usuario/completarCadastro',
        ];

        $rotas_regras_acessarAluno = [
            'aluno/{id_aluno}/gerenciar',
            'aluno/{id_aluno}/objetivos/listar',
            'aluno/{id_aluno}/forum',
        ];

        $rotas_regras_administrador = [
          'aluno/{id_aluno}/gerenciar/permissoes',
          'aluno/{id_aluno}/gerenciar/permissoes/cadastrar',
          'aluno/{id_aluno}/gerenciar/permissoes/requisitar',
          'aluno/{id_aluno}/objetivos/cadastrar'
        ];

        // 'aluno/{id_aluno}/gerenciar/permissoes/{id_permissao}/remover',

        // 'aluno/{id_aluno}/gerenciar/permissoes/notificacao/{id_notificacao}/conceder',

        // 'aluno/{id_aluno}/objetivos/{id_objetivo}/gerenciar'
        // 'aluno/{id_aluno}/objetivos/{id_objetivo}/gerenciar/concluir'
        // 'aluno/{id_aluno}/objetivos/{id_objetivo}/gerenciar/desconcluir'
        // 'aluno/{id_aluno}/objetivos/{id_objetivo}/gerenciar/atividades/listar'
        // 'aluno/{id_aluno}/objetivos/{id_objetivo}/gerenciar/atividades/cadastrar'
        // 'aluno/{id_aluno}/objetivos/{id_objetivo}/gerenciar/atividades/listar'
        // 'aluno/{id_aluno}/objetivos/{id_objetivo}/gerenciar/atividades/cadastrar'
        // 'aluno/{id_aluno}/objetivos/{id_objetivo}/sugestoes/listar'
        // 'aluno/{id_aluno}/objetivos/{id_objetivo}/sugestoes/cadastrar'
        // 'aluno/{id_aluno}/objetivo/{id_objetivo}/forum'
        // 'aluno/{id_aluno}/objetivos/{id_objetivo}/status/cadastrar'

        // 'aluno/{id_aluno}/objetivos/{id_objetivo}/gerenciar/atividades/{id_atividade}/concluir'
        // 'aluno/{id_aluno}/objetivos/{id_objetivo}/gerenciar/atividades/{id_atividade}/desconcluir'
        // 'aluno/{id_aluno}/objetivos/{id_objetivo}/gerenciar/atividades/{id_atividade}/concluir'
        // 'aluno/{id_aluno}/objetivos/{id_objetivo}/gerenciar/atividades/{id_atividade}/desconcluir'

        // 'aluno/{id_aluno}/objetivos/{id_objetivo}/sugestoes/{id_sugestao}/feedbacks/listar'
        // 'aluno/{id_aluno}/objetivos/{id_objetivo}/sugestoes/{id_sugestao}/feedbacks/cadastrar'

        if(in_array($request->route()->uri,$rotas_regras_notificacao)){

            $notificacao = Notificacao::find($request->route('id_notificacao'));

            if($notificacao == NULL || Auth::user()->id != $notificacao->destinatario_id){
                return redirect("/home")->with('denied','Você tentou acessar uma página que você não tem permissão.');
            }

        }else if(in_array($request->route()->uri,$rotas_regras_completarCadastro)){

            if(Auth::user()->cadastrado != false){
                return redirect("/home")->with('denied','Você tentou acessar uma página que você não tem permissão.');
            }

        }else if(in_array($request->route()->uri,$rotas_regras_acessarAluno)){

            $aluno = Aluno::find($request->route('id_aluno'));

            if($aluno == NULL){
              return redirect("/home")->with('denied','Você tentou acessar uma página que você não tem permissão.');
            }

            $gerenciars = $aluno->gerenciars;
            $naoAcessar = true;

            foreach ($gerenciars as $gerenciar) {
              if($gerenciar->user_id == Auth::user()->id){
                $naoAcessar = false;
                break;
              }
            }

            if($naoAcessar){
                return redirect("/home")->with('denied','Você tentou acessar uma página que você não tem permissão.');
            }
        }else if(in_array($request->route()->uri,$rotas_regras_administrador)){

          $aluno = Aluno::find($request->route('id_aluno'));

          if($aluno == NULL){
            return redirect("/home")->with('denied','Você tentou acessar uma página que você não tem permissão.');
          }

          $gerenciars = $aluno->gerenciars;
          $naoAcessar = true;

          foreach ($gerenciars as $gerenciar) {
            if($gerenciar->user_id == Auth::user()->id && $gerenciar->isAdministrador == true){
              $naoAcessar = false;
              break;
            }
          }

          if($naoAcessar){
              return redirect("/home")->with('denied','Você tentou acessar uma página que você não tem permissão.');
          }
        }
    }

      return $next($request);
    }
}
