<?php

namespace App\Http\Controllers;

use App\User;
use App\Aluno;
use App\Gerenciar;
use App\Cargo;
use App\ForumAluno;
use App\MensagemForumAluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlunoController extends Controller{

  public static function gerenciar($id_aluno){
    $aluno = Aluno::find($id_aluno);

    $mensagens = MensagemForumAluno::where('forum_aluno_id','=',$aluno->forum->id)->orderBy('created_at','desc')->take(5)->get();

    return view("aluno.gerenciar",[
      'aluno' => $aluno,
      'mensagens' => $mensagens,
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

      $forum = new ForumAluno();
      $forum->aluno_id = $aluno->id;
      $forum->save;

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

    return view('permissoes.listar',[
      'aluno' => $aluno,
      'gerenciars' => $gerenciars,
    ]);
  }

  public function cadastrarPermissao($id_aluno){
    $aluno = Aluno::find($id_aluno);
    $cargos = Cargo::where('especializacao','=',NULL)->get();

    return view('permissoes.cadastrar',[
      'aluno' => $aluno,
      'cargos' => $cargos,
    ]);
  }

  public function criarPermissao(Request $request){
    //Validação dos dados
    $rules = array(
      'username' => 'required|exists:users,username',
      'cargo' => 'required',
      'especializacao' => 'required_if:cargo,==,Profissional Externo',
    );
    $messages = array(
      'username.required' => 'Necessário inserir um nome de usuário.',
      'username.exists' => 'O usuário em questão não está cadastrado.',
      'cargo.required' => 'Selecione um cargo.',
      'especializacao.required_if' => 'Necessário inserir uma especialização.',
    );
    $validator = Validator::make($request->all(),$rules,$messages);

    if($validator->fails()){
      return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    //Se já existe a relação
    $user = User::where('username','=',$request->username)->first();
      // $gerenciar = Gerenciar::where('aluno_id','=',$request->aluno)->where('user_id','=',$user->id)->first();
      // if($gerenciar != NULL){
      //   return redirect()->back()->withInput()->with('Fail','O usuário '.$user->name.' já possui permissões.');
      // }

    //Criação do Gerencimento
    $gerenciar = new Gerenciar();
    $gerenciar->user_id = $user->id;
    $gerenciar->aluno_id = (int) $request->aluno;
    $cargo = Cargo::where('nome','=',$request->cargo)->where('especializacao','=',NULL)->first();
    $gerenciar->cargo_id = $cargo->id;
    if($request->exists('isAdministrador')){
      $gerenciar->isAdministrador = $request->isAdministrador;
    }
    $gerenciar->save();

    return redirect()->route(
      'aluno.permissoes',[
        'id' => $gerenciar->aluno_id,
      ])->with('Success','O usuário '.$user->name.' agora possui permissão.');
  }
}
