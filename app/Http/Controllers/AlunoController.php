<?php

namespace App\Http\Controllers;

use App\User;
use App\Aluno;
use App\Gerenciar;
use App\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlunoController extends Controller{

  public static function gerenciar($id_aluno){
    $aluno = Aluno::find($id_aluno);

    return view("aluno.gerenciar",[
      'aluno' => $aluno,
    ]);
  }

  public static function listar(){
    $gerenciars = \Auth::user()->gerenciars;
    $alunos = array();

    foreach($gerenciars as $gerenciar){
      array_push($alunos,$gerenciar->aluno);
    }

    //dd($alunos);

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
      $gerenciar->cargo_id = $request->cargo;
      $gerenciar->isAdministrador = True;
      $gerenciar->save();

      return redirect()->route("aluno.listar")->with('success','O Aluno'.$aluno->nome.'foi cadastrado');
  }

  public function gerenciarPermissoes($id_aluno){
    $aluno = Aluno::find($id_aluno);
    $gerenciars = $aluno->gerenciars;

    return view('aluno.permissoes.listar',[
      'aluno' => $aluno,
      'gerenciars' => $gerenciars,
    ]);
  }

  public function cadastrarPermissao($id_aluno){
    $aluno = Aluno::find($id_aluno);
    $cargos = Cargo::where('especializacao','=',NULL)->get();

    return view('aluno.permissoes.cadastrar',[
      'aluno' => $aluno,
      'cargos' => $cargos,
    ]);
  }

  public function criarPermissao(Request $request){
    dd($request->all());
    $gerenciar = new Gerenciar();
    $user = User::where('username','=',$request->username)->first();
    $gerenciar->user_id = $user->id;
    $gerenciar->aluno_id = $request->aluno;
    $cargo = Cargo::where('nome','=',$request->cargo)->where('especializacao','=',NULL)->first();
    $gerenciar->cargo_id = $cargo->id;
    if($request->isAdministrador = "true"){
      $gerenciar->isAdministrador = $request->isAdministrador;
    }
    $gerenciar->save();
    dd($gerenciar);
  }
}
