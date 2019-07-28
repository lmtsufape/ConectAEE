<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sugestao;
use App\Feedback;
use \Auth;

class FeedbackController extends Controller
{
  public function listar($id_sugestao){
    $sugestao = Sugestao::find($id_sugestao);
    $feedbacks = $sugestao->feedbacks;

    return view('feedback.listar',[
      'sugestao' => $sugestao,
      'feedbacks' => $feedbacks,
    ]);
  }

  public function cadastrar($id_aluno, $id_objetivo, $id_sugestao){
    $sugestao = Sugestao::find($id_sugestao);
    $objetivo = $sugestao->objetivo;
    $aluno = $objetivo->aluno;

    return view('feedback.cadastrar',[
      'aluno' => $aluno,
      'objetivo' => $objetivo,
      'sugestao' => $sugestao,
    ]);
  }

  public function criar(Request $request){

    $feedback = new Feedback();
    $feedback->texto = $request->feedback;
    $feedback->sugestao_id = $request->id_sugestao;
    $feedback->user_id = Auth::user()->id;

    $feedback->save();

    return redirect()->route(
      'objetivo.sugestoes.feedbacks.listar',
      [
        $request->id_aluno, $request->id_objetivo, $request->id_sugestao,
      ]
    );
  }
}
