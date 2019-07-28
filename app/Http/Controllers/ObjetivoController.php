<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Objetivo;
use App\TipoObjetivo;
use App\Aluno;
use App\MensagemForumObjetivo;
use DateTime;
use Auth;

class ObjetivoController extends Controller
{
  public function cadastrar($id_aluno){
      $tipos = TipoObjetivo::all();

      $prioridades = ["Alta","Média","Baixa"];
      $aluno = Aluno::find($id_aluno);

      return view("objetivo.cadastrar", ['aluno' => $aluno,
                                         'tipos' => $tipos,
                                         'prioridades' => $prioridades]);
  }

  public function editar($id_aluno, $id_objetivo){
      $tipos = TipoObjetivo::all();

      $prioridades = ["Alta","Média","Baixa"];
      $aluno = Aluno::find($id_aluno);
      $objetivo = Objetivo::find($id_objetivo);

      return view("objetivo.editar", ['aluno' => $aluno,
                                      'objetivo' => $objetivo,
                                      'tipos' => $tipos,
                                      'prioridades' => $prioridades]);
  }

  public function criar(Request $request){
      $validator = Validator::make($request->all(), [
          'titulo' => ['required'],
          'descricao' => ['required','min:2','max:500'],
          'prioridade' => ['required'],
          'tipo' => ['required'],
      ]);

      if($validator->fails()){
          return redirect()->back()->withErrors($validator->errors())->withInput();
      }

      $objetivo = new Objetivo();
      $objetivo->titulo = $request->titulo;
      $objetivo->descricao = $request->descricao;
      $objetivo->prioridade = $request->prioridade;
      $objetivo->data = new DateTime();
      $objetivo->aluno_id = $request->id_aluno;
      $objetivo->user_id = Auth::user()->id;
      $objetivo->tipo_objetivo_id = $request->tipo;
      $objetivo->save();

      return redirect()->route("objetivo.listar", ["id_aluno" => $request->id_aluno])->with('success','Objetivo cadastrado.');
  }

  public function atualizar(Request $request){
      $validator = Validator::make($request->all(), [
        'titulo' => ['required'],
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

      return redirect()->route("objetivo.gerenciar", [$aluno->id,$objetivo->id] )->with('success','O objetivo '.$objetivo->titulo.' foi atualizado.');;
  }

  public function listar($id_aluno){

      $aluno = Aluno::find($id_aluno);
      $objetivos = $aluno->objetivos;

      return view("objetivo.listar", ['aluno' => $aluno,
                                      'objetivos' => $objetivos]);
  }

  public function gerenciar($id_aluno, $id_objetivo){

      $aluno = Aluno::find($id_aluno);
      $objetivo = Objetivo::find($id_objetivo);
      $mensagens = MensagemForumObjetivo::where('forum_objetivo_id','=',$objetivo->forum->id)->orderBy('id','desc')->take(5)->get();

      return view("objetivo.gerenciar",['aluno' => $aluno,
                                        'objetivo' => $objetivo,
                                        'mensagens'=>$mensagens]);
  }

  public function concluir($id_aluno, $id_objetivo){

    $objetivo = Objetivo::find($id_objetivo);

    $objetivo->concluido = True;
    $objetivo->update();

    return redirect()->route("objetivo.gerenciar", ["id_aluno" => $id_aluno, "id_objetivo" => $id_objetivo])->with('success','O objetivo foi concluído.');

  }

  public function desconcluir($id_aluno, $id_objetivo){

    $objetivo = Objetivo::find($id_objetivo);

    $objetivo->concluido = False;
    $objetivo->update();

    return redirect()->route("objetivo.gerenciar", ["id_aluno" => $id_aluno, "id_objetivo" => $id_objetivo])->with('success','O objetivo foi concluído.');

  }


}
