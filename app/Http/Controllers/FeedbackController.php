<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Sugestao;
use App\Aluno;
use App\Objetivo;
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

  public static function editar($id_aluno, $id_objetivo, $id_sugestao, $id_feedback){
    $aluno = Aluno::find($id_aluno);
    $objetivo = Objetivo::find($id_objetivo);
    $sugestao = Sugestao::find($id_sugestao);
    $feedback = Feedback::find($id_feedback);

    return view("feedback.editar", [
      'aluno' => $aluno,
      'objetivo' => $objetivo,
      'sugestao' => $sugestao,
      'feedback' => $feedback,
    ]);
  }

  public static function excluir($id_aluno, $id_objetivo, $id_sugestao, $id_feedback){
    $feedback = Feedback::find($id_feedback);
    $feedback->delete();

    return redirect()->route("feedbacks.listar", [
      "id_aluno" => $id_aluno,
      "id_objetivo" => $id_objetivo,
      "id_sugestao" => $id_sugestao
    ])->with('success','O feedback foi excluído.');
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
    $validator = Validator::make($request->all(), [
      'feedback' => ['required','max:1000'],
    ]);

    if($validator->fails()){
      return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    $feedback = new Feedback();
    $feedback->texto = $request->feedback;
    $feedback->sugestao_id = $request->id_sugestao;
    $feedback->user_id = Auth::user()->id;

    $feedback->save();

    return redirect()->route(
      'feedbacks.listar',
      [
        $request->id_aluno, $request->id_objetivo, $request->id_sugestao,
      ]
    );
  }

  public static function atualizar(Request $request){
    $validator = Validator::make($request->all(), [
      'feedback' => ['required','max:1000'],
    ]);

    if($validator->fails()){
      return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    $feedback = Feedback::find($request->id_feedback);
    $feedback->texto = $request->feedback;
    $feedback->update();

    return redirect()->route("feedbacks.listar", [
      "id_aluno" => $request->id_aluno,
      "id_objetivo" => $request->id_objetivo,
      "id_sugestao" => $request->id_sugestao
    ])->with('success','O feedback foi atualizado.');
  }
}
