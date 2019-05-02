<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Objetivo;
use App\Aluno;
use DateTime;

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
      $objetivo->save();

      $aluno = Aluno::find( $request->id_aluno);


      return redirect()->route("objetivo.listar", ["id_aluno" => $request->id_aluno])->with('success','Objetivo cadastrado.');
  }

  public function listar($id_aluno){

      $objetivos = Objetivo::all();
      $aluno = Aluno::find($id_aluno);

      return view("objetivo.listar", ['aluno' => $aluno,
                                      'objetivos' => $objetivos]);
  }

}
