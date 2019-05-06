<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Objetivo;
use App\Aluno;
use App\MensagemForumObjetivo;
use DateTime;
use Auth;

class ObjetivoController extends Controller
{
  public function cadastrar($id_aluno){
      $tipos = ["Educação", "Saúde"];
      $prioridades = ["Alta","Média","Baixa"];
      $aluno = Aluno::find($id_aluno);

      return view("objetivo.cadastrar", ['aluno' => $aluno,
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
      $objetivo->tipo = $request->tipo;
      $objetivo->data = new DateTime();
      $objetivo->aluno_id = $request->id_aluno;
      $objetivo->user_id = Auth::user()->id;
      $objetivo->save();

      return redirect()->route("objetivo.listar", ["id_aluno" => $request->id_aluno])->with('success','Objetivo cadastrado.');
  }

  public function listar($id_aluno){

      $aluno = Aluno::find($id_aluno);
      $objetivos = $aluno->objetivos;

      return view("objetivo.listar", ['aluno' => $aluno,
                                      'objetivos' => $objetivos]);
  }

  public function gerenciar($id_objetivo){
      
      $objetivo = Objetivo::find($id_objetivo);
      $mensagens = MensagemForumObjetivo::where('forum_objetivo_id','=',$objetivo->forum->id)->orderBy('created_at','desc')->take(5)->get();
      return view("objetivo.gerenciar",['objetivo' => $objetivo,'mensagens'=>$mensagens]);
  }

}
