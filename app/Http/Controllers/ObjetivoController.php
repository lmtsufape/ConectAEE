<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Objetivo;
use App\TipoObjetivo;
use App\Aluno;
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

  public function listar($id_aluno){

      $aluno = Aluno::find($id_aluno);
      $objetivos = $aluno->objetivos;

      return view("objetivo.listar", ['aluno' => $aluno,
                                      'objetivos' => $objetivos]);
  }

}
