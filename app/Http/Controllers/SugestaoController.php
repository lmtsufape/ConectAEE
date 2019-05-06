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
      $statuses = ["Não iniciada","Iniciada", "Em andamento", "Finalizada"];
      $prioridades = ["Alta","Média","Baixa"];
      $aluno = Aluno::find($id_aluno);
      $objetivo = Objetivo::find($id_objetivo);

      return view("sugestao.cadastrar", ['aluno' => $aluno,
                                          'objetivo' => $objetivo,
                                          'statuses' => $statuses,
                                          'prioridades' => $prioridades]);
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
      $sugestao->save();

      return redirect()->route("objetivo.sugestoes.listar", ["id_aluno" => $request->id_aluno, "id_objetivo" => $request->id_objetivo])->with('success','Objetivo cadastrado.');
  }

  public function listar($id_aluno, $id_objetivo){

      $aluno = Aluno::find($id_aluno);
      $objetivo = Objetivo::find($id_objetivo);
      $sugestoes = $objetivo->sugestoes;

      return view("sugestao.listar", ['aluno' => $aluno,
                                       'objetivo' => $objetivo,
                                       'sugestoes' => $sugestoes]);
  }

}
