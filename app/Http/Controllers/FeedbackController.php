<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Sugestao;
use App\Aluno;
use App\Objetivo;
use App\Feedback;
use \Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class FeedbackController extends Controller
{
  // public function listar($id_sugestao){
  //   $sugestao = Sugestao::find($id_sugestao);
  //   $feedbacks = $sugestao->feedbacks;
  //
  //   return view('feedback.listar',[
  //     'sugestao' => $sugestao,
  //     'feedbacks' => $feedbacks,
  //   ]);
  // }

  public static function editar($id_feedback){
    $feedback = Feedback::find($id_feedback);
    $sugestao = $feedback->sugestao;
    $objetivo = $sugestao->objetivo;
    $aluno = $objetivo->aluno;

    return view("feedback.editar", [
      'aluno' => $aluno,
      'objetivo' => $objetivo,
      'sugestao' => $sugestao,
      'feedback' => $feedback,
    ]);
  }

  public static function excluir($id_feedback){
    $feedback = Feedback::find($id_feedback);
    $sugestao = $feedback->sugestao;
    $feedback->delete();

    return Redirect::to(URL::previous() . "#feedbacks")->with('feedback','O feedback foi excluído.');
  }

  // public function cadastrar($id_sugestao){
  //   $sugestao = Sugestao::find($id_sugestao);
  //   $objetivo = $sugestao->objetivo;
  //   $aluno = $objetivo->aluno;
  //
  //   return view('feedback.cadastrar',[
  //     'aluno' => $aluno,
  //     'objetivo' => $objetivo,
  //     'sugestao' => $sugestao,
  //   ]);
  // }

  public function criar(Request $request){
    $validator = Validator::make($request->all(), [
      'feedback' => ['required','max:1000'],
    ]);

    if($validator->fails()){
      return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    $sugestao = Sugestao::find($request->id_sugestao);

    $feedback = new Feedback();
    $feedback->texto = $request->feedback;
    $feedback->sugestao_id = $sugestao->id;
    $feedback->user_id = Auth::user()->id;
    $feedback->save();

    return Redirect::to(URL::previous() . "#feedbacks")->with('feedback','O feedback foi enviado.');
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

    return Redirect::to(route("sugestao.ver", ["id_sugestao" => $feedback->sugestao->id]) . "#feedbacks")->with('feedback','O feedback foi atualizado.');
  }
}
