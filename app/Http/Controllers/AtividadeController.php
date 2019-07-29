<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Objetivo;
use App\Aluno;
use App\Atividade;
use DateTime;

class AtividadeController extends Controller
{
  public static function cadastrar($id_aluno, $id_objetivo){
    $statuses = ["Não iniciada","Iniciada", "Em andamento", "Finalizada"];
    $prioridades = ["Alta","Média","Baixa"];
    $aluno = Aluno::find($id_aluno);
    $objetivo = Objetivo::find($id_objetivo);

    return view("atividade.cadastrar", [
      'aluno' => $aluno,
      'objetivo' => $objetivo,
      'statuses' => $statuses,
      'prioridades' => $prioridades
    ]);
  }

  public static function editar($id_aluno, $id_objetivo, $id_atividade){
    $aluno = Aluno::find($id_aluno);
    $objetivo = Objetivo::find($id_objetivo);
    $atividade = Atividade::find($id_atividade);
    $statuses = ["Não iniciada","Iniciada", "Em andamento", "Finalizada"];
    $prioridades = ["Alta","Média","Baixa"];

    return view("atividade.editar", [
      'aluno' => $aluno,
      'objetivo' => $objetivo,
      'atividade' => $atividade,
      'statuses' => $statuses,
      'prioridades' => $prioridades
    ]);
  }

  public static function excluir($id_aluno, $id_objetivo, $id_atividade){
    $atividade = Atividade::find($id_atividade);
    $atividade->delete();

    return redirect()->route("atividades.listar", ["id_aluno" => $id_aluno, "id_objetivo" => $id_objetivo])->with('success','A atividade '.$atividade->titulo.' foi excluída.');;
  }

  public static function criar(Request $request){
    $validator = Validator::make($request->all(), [
      'titulo' => ['required'],
      'descricao' => ['max:500'],
      'prioridade' => ['required'],
      'status' => ['required'],
    ]);

    if($validator->fails()){
      return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    $atividade = new Atividade();
    $atividade->titulo = $request->titulo;
    $atividade->descricao = $request->descricao;
    $atividade->prioridade = $request->prioridade;
    $atividade->status = $request->status;
    $atividade->data = new DateTime();
    $atividade->objetivo_id = $request->id_objetivo;
    $atividade->save();

    return redirect()->route("atividades.listar", ["id_aluno" => $request->id_aluno, "id_objetivo" => $request->id_objetivo])->with('success','Atividade cadastrada.');
  }

  public static function atualizar(Request $request){
    $validator = Validator::make($request->all(), [
      'titulo' => ['required'],
      'descricao' => ['max:500'],
      'prioridade' => ['required'],
      'status' => ['required'],
    ]);

    if($validator->fails()){
      return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    $atividade = Atividade::find($request->id_atividade);
    $atividade->titulo = $request->titulo;
    $atividade->descricao = $request->descricao;
    $atividade->prioridade = $request->prioridade;
    $atividade->status = $request->status;
    $atividade->update();

    return redirect()->route("atividades.listar", ["id_aluno" => $request->id_aluno, "id_objetivo" => $request->id_objetivo])->with('success','A atividade '.$atividade->titulo.' foi atualizada.');
  }

  public static function listar($id_aluno, $id_objetivo){

    $aluno = Aluno::find($id_aluno);
    $objetivo = Objetivo::find($id_objetivo);
    $atividades = $objetivo->atividades;

    return view("atividade.listar", [
      'aluno' => $aluno,
      'objetivo' => $objetivo,
      'atividades' => $atividades
    ]);
  }

  public static function concluir($id_aluno, $id_objetivo, $id_atividade){

    $aluno = Aluno::find($id_aluno);
    $objetivo = Objetivo::find($id_objetivo);
    $atividades = $objetivo->atividades;

    $atividade = Atividade::find($id_atividade);
    $atividade->concluido = True;
    $atividade->update();

    return redirect()->route("atividades.listar", [
      'aluno' => $aluno,
      'objetivo' => $objetivo,
      'atividades' => $atividades
    ]);
  }

  public static function desconcluir($id_aluno, $id_objetivo, $id_atividade){

    $aluno = Aluno::find($id_aluno);
    $objetivo = Objetivo::find($id_objetivo);
    $atividades = $objetivo->atividades;

    $atividade = Atividade::find($id_atividade);
    $atividade->concluido = False;
    $atividade->update();

    return redirect()->route("atividades.listar", [
      'aluno' => $aluno,
      'objetivo' => $objetivo,
      'atividades' => $atividades
    ]);

  }

}
