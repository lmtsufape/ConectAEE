<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Objetivo;
use App\Aluno;
use App\Sugestao;
use DateTime;

class SugestaoController extends Controller
{
  public function cadastrar($id_aluno, $id_objetivo){
    $aluno = Aluno::find($id_aluno);
    $objetivo = Objetivo::find($id_objetivo);

    return view("sugestao.cadastrar", [
      'aluno' => $aluno,
      'objetivo' => $objetivo,
    ]);
  }

  public static function editar($id_aluno, $id_objetivo, $id_sugestao){
    $aluno = Aluno::find($id_aluno);
    $objetivo = Objetivo::find($id_objetivo);
    $sugestao = Sugestao::find($id_sugestao);

    return view("sugestao.editar", [
      'aluno' => $aluno,
      'objetivo' => $objetivo,
      'sugestao' => $sugestao,
    ]);
  }

  public static function excluir($id_aluno, $id_objetivo, $id_sugestao){
    $sugestao = Sugestao::find($id_sugestao);
    $sugestao->delete();

    return redirect()->route("sugestoes.listar", ["id_aluno" => $id_aluno, "id_objetivo" => $id_objetivo])->with('success','A sugestão '.$sugestao->titulo.' foi excluída.');;
  }

  public function criar(Request $request){
    $validator = Validator::make($request->all(), [
      'titulo' => ['required'],
      'descricao' => ['max:500'],
    ]);

    if($validator->fails()){
      return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    $sugestao = new Sugestao();
    $sugestao->titulo = $request->titulo;
    $sugestao->descricao = $request->descricao;
    $sugestao->data = new DateTime();
    $sugestao->objetivo_id = $request->id_objetivo;
    $sugestao->user_id = \Auth::user()->id;
    $sugestao->save();

    return redirect()->route("sugestoes.listar", ["id_aluno" => $request->id_aluno, "id_objetivo" => $request->id_objetivo])->with('success','Sugestão cadastrada.');
  }

  public static function atualizar(Request $request){
    $validator = Validator::make($request->all(), [
      'titulo' => ['required'],
      'descricao' => ['max:500'],
    ]);

    if($validator->fails()){
      return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    $sugestao = Sugestao::find($request->id_sugestao);
    $sugestao->titulo = $request->titulo;
    $sugestao->descricao = $request->descricao;
    $sugestao->update();

    return redirect()->route("sugestoes.listar", ["id_aluno" => $request->id_aluno, "id_objetivo" => $request->id_objetivo])->with('success','A sugestãoatividade '.$sugestao->titulo.' foi atualizada.');
  }

  public function listar($id_aluno, $id_objetivo){

    $aluno = Aluno::find($id_aluno);
    $objetivo = Objetivo::find($id_objetivo);
    $sugestoes = $objetivo->sugestoes;

    return view("sugestao.listar", [
      'aluno' => $aluno,
      'objetivo' => $objetivo,
      'sugestoes' => $sugestoes
    ]);
  }

}
