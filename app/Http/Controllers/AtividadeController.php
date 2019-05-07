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
  public function cadastrar($id_aluno, $id_objetivo){
      $statuses = ["Não iniciada","Iniciada", "Em andamento", "Finalizada"];
      $prioridades = ["Alta","Média","Baixa"];
      $aluno = Aluno::find($id_aluno);
      $objetivo = Objetivo::find($id_objetivo);

      return view("atividade.cadastrar", ['aluno' => $aluno,
                                          'objetivo' => $objetivo,
                                          'statuses' => $statuses,
                                          'prioridades' => $prioridades]);
  }

  public function criar(Request $request){
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

      return redirect()->route("objetivo.atividades.listar", ["id_aluno" => $request->id_aluno, "id_objetivo" => $request->id_objetivo])->with('success','Atividade cadastrada.');
  }

  public function listar($id_aluno, $id_objetivo){

      $aluno = Aluno::find($id_aluno);
      $objetivo = Objetivo::find($id_objetivo);
      $atividades = $objetivo->atividades;

      return view("atividade.listar", ['aluno' => $aluno,
                                       'objetivo' => $objetivo,
                                       'atividades' => $atividades]);
  }

}
