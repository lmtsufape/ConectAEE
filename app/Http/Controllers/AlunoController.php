<?php

namespace App\Http\Controllers;

use App\User;
use App\Instituicao;
use App\Notificacao;
use App\Aluno;
use App\Gerenciar;
use App\Perfil;
use App\Endereco;
use App\ForumAluno;
use App\MensagemForumAluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlunoController extends Controller{

  public static function gerenciar($id_aluno){
    $aluno = Aluno::find($id_aluno);

    $mensagens = MensagemForumAluno::where('forum_aluno_id','=',$aluno->forum->id)->orderBy('id','desc')->take(5)->get();

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

    return view("aluno.listar",[
      'alunos' => $alunos
    ]);
  }

  public function cadastrar(){
      $estados = ['AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA',
                  'PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO'];

      $tamanho = 1;
      $instituicoes = Instituicao::all();

      return view("aluno.cadastrar", ['estados' => $estados,'tamanho' => $tamanho,
                                      'instituicoes' => $instituicoes]);
  }

  public function buscar(){

    return view("aluno.buscar", ['codigo' => [],
                                 'aluno' => []]);
  }

  public function buscarCodigo(Request $request){

    $codigo = $request->codigo;
    $aluno = Aluno::where('codigo','=', $codigo)->first();
    $botaoAtivo = false;

    if ($aluno != null) {
      $gerenciars = $aluno->gerenciars;


      foreach ($gerenciars as $gerenciar) {
        if ($gerenciar->user->id == \Auth::user()->id && $gerenciar->isAdministrador) {
          $botaoAtivo = true;
        }
      }
    }

    return view("aluno.buscar", ['aluno' => $aluno,
                                 'codigo' => $codigo,
                                 'botaoAtivo' => $botaoAtivo]);

  }

  public function criar(Request $request){

      $validator = Validator::make($request->all(), [
          'perfil' => ['required'],
          'instituicoes' => ['required'],
          'nome' => ['required','min:2','max:191'],
          'sexo' => ['required'],
          'cid' => ['nullable','regex:/(^([a-zA-z])(\d)(\d)(\d)$)/u'],
          'descricaoCid' => ['required_with:cid'],
          'observacao' => ['nullable'],
          'data_nascimento' => ['required','date','before:today','after:01/01/1900'],
          'logradouro' => ['required'],
          'numero' => ['required','numeric'],
          'bairro' => ['required'],
          'cidade' => ['required'],
          'estado' => ['required'],
          'username' => ['required_if:perfil,==,2','unique:users']
      ],[
        'username.required_if' => 'É necessário criar um usuário quando o cadastrante é um Professor AEE',
      ]);

      if($validator->fails()){
          return redirect()->back()->withErrors($validator->errors())->withInput();
      }

      $endereco = new Endereco();
      $endereco->numero = $request->numero;
      $endereco->logradouro = $request->logradouro;
      $endereco->bairro = $request->bairro;
      $endereco->cidade = $request->cidade;
      $endereco->estado = $request->estado;
      $endereco->save();

      $aluno = new Aluno();
      $aluno->nome = $request->nome;
      $aluno->sexo = $request->sexo;
      $aluno->cid = $request->cid;
      $aluno->descricao_cid = $request->descricaoCid;
      $aluno->observacao = $request->observacao;
      $aluno->data_de_nascimento = $request->data_nascimento;
      $aluno->endereco_id = $endereco->id;

      do{
        $codigo = str_random(8);
        $alunoCodigo = Aluno::where('codigo','=',$codigo)->first();
      }while($alunoCodigo != NULL);

      $aluno->codigo = $codigo;
      $aluno->save();

      $aluno->instituicoes()->attach($request->instituicoes);

      $forum = new ForumAluno();
      $forum->aluno_id = $aluno->id;
      $forum->save();

      $gerenciar = new Gerenciar();
      $gerenciar->user_id = \Auth::user()->id;
      $gerenciar->aluno_id = $aluno->id;
      $gerenciar->perfil_id = $request->perfil;
      $gerenciar->isAdministrador = True;
      $gerenciar->save();

      $password = str_random(6);

      if($request->perfil == 2){
        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt($password);
        $user->save();

        $gerenciar = new Gerenciar();
        $gerenciar->user_id = $user->id;
        $gerenciar->aluno_id = $aluno->id;
        $gerenciar->perfil_id = $request->perfil;
        $gerenciar->isAdministrador = True;
        $gerenciar->save();
      }

      return redirect()->route("aluno.listar")->with('success','O Aluno '.$aluno->nome.' foi cadastrado.')->with('password', 'A senha do usuário é '.$password.'.');
  }

  public function requisitarPermissao($id_aluno){
    $aluno = Aluno::find($id_aluno);

    $perfis = Perfil::where('especializacao','=',NULL)->get();

    return view('permissoes.requisitar',[
      'aluno' => $aluno,
      'perfis' => $perfis,
    ]);
  }

  public function notificar(Request $request){

    $rules = array(
      'perfil' => 'required',
      'especializacao' => 'required_if:perfil,==,Profissional Externo',
    );
    $messages = array(
      'perfil.required' => 'Selecione um perfil.',
      'especializacao.required_if' => 'Necessário inserir uma especialização.',
    );

    $validator = Validator::make($request->all(),$rules,$messages);

    if($validator->fails()){
      return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    $aluno = Aluno::find($request->id_aluno);
    $gerenciars = $aluno->gerenciars;

    $perfil = NULL;
    if($request->perfil == 'Profissional Externo'){
      $perfil = new Perfil();
      $perfil->nome = 'Profissional Externo';
      $perfil->especializacao = $request->especializacao;
      $perfil->save();
    }else{
      $perfil = Perfil::where('nome','=',$request->perfil)->where('especializacao','=',NULL)->first();
    }

    foreach ($gerenciars as $gerenciar) {
      if ($gerenciar->isAdministrador) {
        $notificacao = new Notificacao();
        $notificacao->aluno_id = $aluno->id;
        $notificacao->remetente_id = \Auth::user()->id;
        $notificacao->destinatario_id = $gerenciar->user_id;
        $notificacao->perfil_id = $perfil->id;
        $notificacao->lido = false;
        $notificacao->tipo = 1;
        $notificacao->save();
      }
    }

    return redirect()->route("aluno.listar")->with('success','Seu pedido de acesso à '.$aluno->nome.' foi enviado. Aguarde aceitação.');
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
    $perfis = Perfil::where('especializacao','=',NULL)->get();

    return view('permissoes.cadastrar',[
      'aluno' => $aluno,
      'perfis' => $perfis,
    ]);
  }

  public function concederPermissao($id_aluno, $id_notificacao){
    $aluno = Aluno::find($id_aluno);
    $notificacao = Notificacao::find($id_notificacao);

    return view('permissoes.conceder',[
      'aluno' => $aluno,
      'notificacao' => $notificacao,
    ]);
  }

  public function criarPermissao(Request $request){
    //Validação dos dados
    $rules = array(
      'username' => 'required|exists:users,username',
      'perfil' => 'required',
      'especializacao' => 'required_if:perfil,==,Profissional Externo',
    );
    $messages = array(
      'username.required' => 'Necessário inserir um nome de usuário.',
      'username.exists' => 'O usuário em questão não está cadastrado.',
      'perfil.required' => 'Selecione um perfil.',
      'especializacao.required_if' => 'Necessário inserir uma especialização.',
    );
    $validator = Validator::make($request->all(),$rules,$messages);
    if($validator->fails()){
      return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    //Se já existe a relação
    $user = User::where('username','=',$request->username)->first();
    if((Gerenciar::where('user_id','=',$user->id)->where('aluno_id','=',$request->id_aluno))->first()){
      $validator->errors()->add('username','O usuário já possui permissões de acesso ao aluno.');
      return redirect()->back()->withErrors($validator->errors())->withInput();
    }
      // $gerenciar = Gerenciar::where('aluno_id','=',$request->aluno)->where('user_id','=',$user->id)->first();
      // if($gerenciar != NULL){
      //   return redirect()->back()->withInput()->with('Fail','O usuário '.$user->name.' já possui permissões.');
      // }

    //Criação do Gerencimento
    $gerenciar = new Gerenciar();
    $gerenciar->user_id = $user->id;
    $gerenciar->aluno_id = (int) $request->id_aluno;

    $perfil = NULL;
    if($request->perfil == 'Profissional Externo'){
      $perfil = new Perfil();
      $perfil->nome = 'Profissional Externo';
      $perfil->especializacao = $request->especializacao;
      $perfil->save();
    }else{
      $perfil = Perfil::where('nome','=',$request->perfil)->where('especializacao','=',NULL)->first();
    }
    $gerenciar->perfil_id = $perfil->id;
    if($request->exists('isAdministrador')){
      $gerenciar->isAdministrador = $request->isAdministrador;
    }
    //dd($gerenciar);
    $gerenciar->save();

    $notificacao = new Notificacao();
    $notificacao->aluno_id = $gerenciar->aluno_id;
    $notificacao->remetente_id = \Auth::user()->id;
    $notificacao->destinatario_id = $gerenciar->user_id;
    $notificacao->perfil_id = $gerenciar->perfil_id;
    $notificacao->lido = false;
    $notificacao->tipo = 2;
    $notificacao->save();

    return redirect()->route(
      'aluno.permissoes',[
        'id_aluno' => $gerenciar->aluno_id,
      ])->with('Success','O usuário '.$user->name.' agora possui permissão.');
  }

  public function removerPermissao($id_aluno,$id_permissao){
    $gerenciar = Gerenciar::find($id_permissao);
    $gerenciar->delete();

    return redirect()->back()->with('Removed','Permissões removidas com sucesso.');
  }

  // public function buscar(Request $request){
  //   $termo = $request->termo;
  //
  //   if(!is_null($termo)){
  //     $aluno = Aluno::orWhere('name', 'ilike', '%'.$termo.'%')
  //                             ->orWhere('estado', 'ilike', '%'.$termo.'%')
  //                             ->orWhere('cidade', 'ilike', '%'.$termo.'%')
  //                             ->orWhereHas('coordenador', function ($query) use ($termo) {
  //                               $query->where('name', 'ilike', '%'.$termo.'%');
  //                              })->get();
  // }

}
