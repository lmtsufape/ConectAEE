<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Objetivo;
use App\Gerenciar;
use App\ForumObjetivo;
use App\TipoObjetivo;
use App\Aluno;
use App\Cor;
use App\MensagemForumObjetivo;
use DateTime;
use Auth;

class ObjetivoController extends Controller
{
  public static function cadastrar($id_aluno){
    $tipos = TipoObjetivo::all();

    $prioridades = ["Alta","Média","Baixa"];
    $aluno = Aluno::find($id_aluno);

    return view("objetivo.cadastrar", [
      'aluno' => $aluno,
      'tipos' => $tipos,
      'prioridades' => $prioridades
    ]);
  }

  public static function listar($id_aluno){

    $aluno = Aluno::find($id_aluno);
    $objetivosGroupByUser = $aluno->objetivos->groupBy('user_id');

    $size = count(max($objetivosGroupByUser->toArray()));

    return view("objetivo.listarImagens", [
      'aluno' => $aluno,
      'objetivosGroupByUser' => $objetivosGroupByUser,
      'size' => $size,
    ]);
  }

  public static function editar($id_objetivo){
    $tipos = TipoObjetivo::all();

    $prioridades = ["Alta","Média","Baixa"];
    $objetivo = Objetivo::find($id_objetivo);
    $aluno = $objetivo->aluno;

    return view("objetivo.editar", [
      'aluno' => $aluno,
      'objetivo' => $objetivo,
      'tipos' => $tipos,
      'prioridades' => $prioridades
    ]);
  }

  public static function excluir($id_objetivo){
    $objetivo = Objetivo::find($id_objetivo);
    $objetivo->delete();

    return redirect()->route("objetivo.listar", ["id_aluno" => $objetivo->aluno->id])->with('success','O objetivo '.$objetivo->titulo.' foi excluído.');;
  }

  public static function criar(Request $request){
    $validator = Validator::make($request->all(), [
      'titulo' => ['required','min:2','max:100'],
      'descricao' => ['required','min:2','max:500'],
      'prioridade' => ['required'],
      'tipo' => ['required'],
    ]);

    if($validator->fails()){
      return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    $objetivosUser = Objetivo::where('user_id','=',Auth::user()->id)->where('aluno_id','=',$request->id_aluno)->get();

    $objetivo = new Objetivo();
    $objetivo->titulo = $request->titulo;
    $objetivo->descricao = $request->descricao;
    $objetivo->prioridade = $request->prioridade;
    $objetivo->data = new DateTime();
    $objetivo->aluno_id = $request->id_aluno;
    $objetivo->user_id = Auth::user()->id;
    $objetivo->tipo_objetivo_id = $request->tipo;
    $objetivo->save();

    $aluno = $objetivo->aluno;
    $objetivosGroupByUser = $aluno->objetivos->groupBy('user_id');
    $n_users = count($objetivosGroupByUser);

    $cores = Cor::take($n_users)->get();

    if(count($objetivosUser) == 0){
      $objetivo->cor_id = $cores[$n_users-1]->id;
      $objetivo->update();
    }else{
      $objetivo->cor_id = $objetivosGroupByUser[Auth::user()->id][0]->cor->id;
      $objetivo->update();
    }

    $forum = new ForumObjetivo();
    $forum->objetivo_id = $objetivo->id;
    $forum->save();

    return redirect()->route("objetivo.listar", ["id_aluno" => $request->id_aluno])->with('success','Objetivo cadastrado.');
  }

  public static function atualizar(Request $request){
    $validator = Validator::make($request->all(), [
      'titulo' => ['required','min:2','max:100'],
      'descricao' => ['required','min:2','max:500'],
      'prioridade' => ['required'],
      'tipo' => ['required'],
    ]);

    if($validator->fails()){
      return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    $objetivo = Objetivo::find($request->id_objetivo);
    $objetivo->titulo = $request->titulo;
    $objetivo->descricao = $request->descricao;
    $objetivo->prioridade = $request->prioridade;
    $objetivo->tipo_objetivo_id = $request->tipo;
    $objetivo->update();

    $aluno = Aluno::find($request->id_aluno);

    return redirect()->route('objetivo.gerenciar',[$objetivo->id] )->with('success','O objetivo '.$objetivo->titulo.' foi atualizado.');;
  }

  public static function gerenciar($id_objetivo){

    $objetivo = Objetivo::find($id_objetivo);
    $aluno = $objetivo->aluno;
    $mensagens = MensagemForumObjetivo::where('forum_objetivo_id','=',$objetivo->forum->id)->orderBy('id','desc')->take(5)->get();

    return view("objetivo.gerenciar",[
      'aluno' => $aluno,
      'objetivo' => $objetivo,
      'mensagens'=>$mensagens
    ]);
  }

  public function concluir($id_objetivo){

    $objetivo = Objetivo::find($id_objetivo);

    $objetivo->concluido = True;
    $objetivo->update();

    return redirect()->route("objetivo.gerenciar", ["id_objetivo" => $id_objetivo])->with('success','O objetivo foi concluído.');

  }

  public function desconcluir($id_objetivo){

    $objetivo = Objetivo::find($id_objetivo);

    $objetivo->concluido = False;
    $objetivo->update();

    return redirect()->route("objetivo.gerenciar", ["id_objetivo" => $id_objetivo])->with('success','O objetivo não foi concluído.');

  }


}
