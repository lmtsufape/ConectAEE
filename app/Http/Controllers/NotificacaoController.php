<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacaoController extends Controller
{

  public static function listar(){
    $notificacoes = \Auth::user()->notificacoes;

    return view("notificacao.listar",[
      'notificacoes' => $notificacoes
    ]);
  }

}
