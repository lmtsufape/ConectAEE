<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notificacao;

class NotificacaoController extends Controller
{

  public function listar(){
    $notificacoes = \Auth::user()->notificacoes;

    return view("notificacao.listar",[
      'notificacoes' => $notificacoes
    ]);
  }

  public function ler($id_notificacao){
    $notificacao = Notificacao::find($id_notificacao);
    $notificacao->lido = true;
    $notificacao->update();

    switch ($notificacao->tipo) {
      case 1:
        return redirect()->route('aluno.permissoes.conceder',[
          'id_aluno' => $notificacao->aluno->id,
          'id_notificacao' => $notificacao->id
        ]);
        break;
      case 2:
        return redirect()->route('aluno.gerenciar',['id_aluno' => $notificacao->aluno->id]);
        break;
      default:
        return redirect()->route('objetivo.gerenciar',['id_objetivo' => $notificacao->objetivo->id]);
        break;
    }
  }

}
