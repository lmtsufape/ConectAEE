<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notificacao;
use Illuminate\Support\Facades\Auth;

class NotificacaoController extends Controller
{

  public function listar(){
    $notificacoes = Notificacao::where('destinatario_id','=',Auth::user()->id)->paginate(20);

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
          'id_notificacao' => $notificacao->id
        ]);
      case 2:
        return redirect()->route('aluno.gerenciar',['id_aluno' => $notificacao->aluno->id]);
      default:
        return redirect()->route('objetivo.gerenciar',['id_objetivo' => $notificacao->objetivo->id]);
    }
  }

  public  function lerTodas()
  {
      $notificacoes = Notificacao::where('destinatario_id','=',Auth::user()->id)->paginate(20);
      foreach ($notificacoes as $notificacao){
          if($notificacao->lido == False) {
              $notificacao->lido = true;
              $notificacao->update();
          }
      }
      return $this->listar();
  }

}
