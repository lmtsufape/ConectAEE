<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Gerenciar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlunoController extends Controller{

  public static function gerenciar(){

    return view("aluno.gerenciar");
  }

  public static function listar(){
    $alunos = \App\Aluno::all();
    return view("aluno.listar",[
      'alunos' => $alunos
    ]);
  }

  public function cadastrar(){
      return view("aluno.cadastrar");
  }

  public function criar(Request $request){
      $validator = Validator::make($request->all(), [
          'nome' => ['required','min:2','max:191']
      ]);

      if($validator->fails()){
          return redirect()->back()->withErrors($validator->errors())->withInput();
      }

      $aluno = new Aluno();
      $aluno->nome = $request->nome;
      $aluno->save();

      $gerenciar = new Gerenciar();
      $gerenciar->user_id = \Auth::user()->id;
      $gerenciar->aluno_id = $aluno->id;
      $gerenciar->cargo_id = NULL;
      $gerenciar->save();

      return redirect()->route("aluno.listar")->with('success','O Aluno'.$aluno->nome.'foi cadastrado');
  }
}
