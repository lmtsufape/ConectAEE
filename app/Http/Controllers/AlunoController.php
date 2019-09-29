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
use File;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlunoController extends Controller{

  public static function gerenciar($id_aluno){
    $aluno = Aluno::find($id_aluno);

    $mensagens = MensagemForumAluno::where('forum_aluno_id','=',$aluno->forum->id)
                                   // ->where('texto', 'not like', '%'.'<img'.'%')
                                   // ->where('texto', 'not like', '%'.'<iframe'.'%')
                                   ->orderBy('id','desc')->take(5)->get();

    foreach ($mensagens as $mensagem) {
      $img = strpos($mensagem->texto, '<img');
      $video = strpos($mensagem->texto, '<iframe');

      if($img){
        $mensagem->texto = str_replace('<img', '<img style="width:100%"', $mensagem->texto);
      }

      if($video){
        $mensagem->texto = str_replace('<iframe', '<iframe style="width:100%"', $mensagem->texto);
      }
    }

    return view("aluno.gerenciar",[
      'aluno' => $aluno,
      'mensagens' => $mensagens,
    ]);
  }

  public static function listar(){
    $gerenciars = \Auth::user()->gerenciars;
    $ids_alunos = array();

    foreach($gerenciars as $gerenciar){
      array_push($ids_alunos,$gerenciar->aluno_id);
    }

    $alunos = Aluno::whereIn('id', $ids_alunos)->paginate(12);

    return view("aluno.listarImagens",[
      'alunos' => $alunos,
      'termo' => ""
    ]);
  }

  public static function buscarAluno(Request $request){

    $gerenciars = \Auth::user()->gerenciars;
    $ids_alunos = array();

    foreach($gerenciars as $gerenciar){
      array_push($ids_alunos,$gerenciar->aluno_id);
    }

    $alunos = Aluno::whereIn('id', $ids_alunos)->where('nome','ilike', '%'.$request->termo.'%')->paginate(12);

    return view("aluno.listarImagens",[
      'alunos' => $alunos,
      'termo' => $request->termo
    ]);

  }

  public function cadastrar(){
    $instituicoes = \Auth::user()->instituicoes;
    $perfis = [[1,'Responsável'], [2,'Professor AEE']];

    return view("aluno.cadastrar", [
      'instituicoes' => $instituicoes,
      'perfis' => $perfis
    ]);
  }

  public static function editar($id_aluno){

    $aluno = Aluno::find($id_aluno);
    $endereco = $aluno->endereco;
    $perfis = [[1,'Responsável'], [2,'Professor AEE']];
    $instituicoes = \Auth::user()->instituicoes;

    return view("aluno.editar", [
      'aluno' => $aluno,
      'endereco' =>$endereco,
      'instituicoes' => $instituicoes,
      'perfis' => $perfis
    ]);
  }

  public static function excluir($id_aluno){
    $aluno = Aluno::find($id_aluno);

    $gerenciars = Gerenciar::where('aluno_id','=',$aluno->id)->get();

    foreach($gerenciars as $gerenciar){
      $gerenciar->delete();
    }

    $aluno->delete();

    return redirect()->route("aluno.listar")->with('success','O aluno '.$aluno->nome.' foi excluído.');
  }

  public static function buscar(){

    return view("aluno.buscar", [
      'matricula' => [],
      'aluno' => []
    ]);
  }

  public static function buscarMatricula(Request $request){

    $matricula = $request->matricula;
    $aluno = Aluno::where('matricula','=', $matricula)->first();
    $botaoAtivo = false;

    if ($aluno != null) {
      $gerenciars = $aluno->gerenciars;

      foreach ($gerenciars as $gerenciar) {
        if ($gerenciar->user->id == \Auth::user()->id && $gerenciar->isAdministrador) {
          $botaoAtivo = true;
        }
      }
    }

    return view("aluno.buscar", [
      'aluno' => $aluno,
      'matricula' => $matricula,
      'botaoAtivo' => $botaoAtivo
    ]);

  }

  public static function criar(Request $request){

    $validator = Validator::make($request->all(), [
      'perfil' => ['required'],
      'instituicoes' => ['required'],
      'imagem' => 'image|mimes:jpeg,png,jpg,jpe|max:3000',
      'nome' => ['required','min:2','max:191'],
      'sexo' => ['required'],
      'cid' => ['nullable','regex:/(^([a-zA-z])(\d)(\d)(\d)$)/u'],
      'descricaoCid' => ['required_with:cid'],
      'observacao' => ['nullable','max:500'],
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

    // if ($request->imagem != null) {
    //   $nome = uniqid(date('HisYmd'));
    //   $extensao = $request->imagem->extension();
    //   $nomeArquivo = "{$nome}.{$extensao}";
    //   $request->imagem->move(public_path('avatars'), $nomeArquivo);
    //   $aluno->imagem = "/avatars/".$nomeArquivo;
    // }

    if ($request->imagem != null) {
      $nome = uniqid(date('HisYmd'));
      $extensao = $request->imagem->extension();
      $nomeArquivo = "{$nome}.{$extensao}";
      $request->imagem->storeAs('public/avatars', $nomeArquivo);
      $aluno->imagem = $nomeArquivo;
    }

    $aluno->nome = $request->nome;
    $aluno->sexo = $request->sexo;
    $aluno->cid = $request->cid;
    $aluno->descricao_cid = $request->descricaoCid;
    $aluno->observacao = $request->observacao;
    $aluno->data_de_nascimento = $request->data_nascimento;
    $aluno->endereco_id = $endereco->id;

    do{
      $matricula = str_random(8);
      $alunoMatricula = Aluno::where('matricula','=',$matricula)->first();
    }while($alunoMatricula != NULL);

    $aluno->matricula = $matricula;
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
      $user->cadastrado = false;
      $user->save();

      $gerenciar = new Gerenciar();
      $gerenciar->user_id = $user->id;
      $gerenciar->aluno_id = $aluno->id;
      $gerenciar->perfil_id = $request->perfil;
      $gerenciar->isAdministrador = True;
      $gerenciar->save();
    }

    if($request->perfil == 2){
      return redirect()->route("aluno.listar")->with('success','O Aluno '.$aluno->nome.' foi cadastrado.')->with('password', 'A senha do usuário '.$request->username.' é '.$password.'.');
    }else{
      return redirect()->route("aluno.listar")->with('success','O Aluno '.$aluno->nome.' foi cadastrado.');
    }
  }

  public static function atualizar(Request $request){

    $validator = Validator::make($request->all(), [
      'instituicoes' => ['required'],
      'imagem' => 'image|mimes:jpeg,png,jpg,jpe|max:3000',
      'nome' => ['required','min:2','max:191'],
      'sexo' => ['required'],
      'cid' => ['nullable','regex:/(^([a-zA-z])(\d)(\d)(\d)$)/u'],
      'descricaoCid' => ['required_with:cid'],
      'observacao' => ['nullable','max:500'],
      'data_nascimento' => ['required','date','before:today','after:01/01/1900'],
      'logradouro' => ['required'],
      'numero' => ['required','numeric'],
      'bairro' => ['required'],
      'cidade' => ['required'],
      'estado' => ['required'],
    ]);

    if($validator->fails()){
      return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    $endereco = Endereco::find($request->id_endereco);
    $endereco->logradouro = $request->logradouro;
    $endereco->numero = $request->numero;
    $endereco->bairro = $request->bairro;
    $endereco->cidade = $request->cidade;
    $endereco->estado = $request->estado;
    $endereco->update();

    $aluno = Aluno::find($request->id_aluno);

    if ($request->imagem != null) {
      $nome = uniqid(date('HisYmd'));
      $extensao = $request->imagem->extension();
      $nomeArquivo = "{$nome}.{$extensao}";
      $request->imagem->storeAs('public/avatars', $nomeArquivo);
      $aluno->imagem = $nomeArquivo;
    }

    $aluno->nome = $request->nome;
    $aluno->sexo = $request->sexo;
    $aluno->cid = $request->cid;
    $aluno->descricao_cid = $request->descricaoCid;
    $aluno->observacao = $request->observacao;
    $aluno->data_de_nascimento = $request->data_nascimento;
    $aluno->endereco_id = $endereco->id;

    $aluno->update();
    $aluno->instituicoes()->detach();
    $aluno->instituicoes()->attach($request->instituicoes);

    return redirect()->route("aluno.gerenciar", ['id_aluno' => $request->id_aluno])->with('success','O Aluno '.$aluno->nome.' foi atualizado.');
  }

  public static function requisitarPermissao($matricula){
    $aluno = Aluno::where('matricula','=',$matricula)->first();

    $perfis = Perfil::where('especializacao','=',NULL)->get();

    return view('permissoes.requisitar',[
      'aluno' => $aluno,
      'perfis' => $perfis,
    ]);
  }

  public static function notificarPermissao(Request $request){

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

  public static function gerenciarPermissoes($id_aluno){
    $aluno = Aluno::find($id_aluno);
    $gerenciars = $aluno->gerenciars;

    return view('permissoes.listar',[
      'aluno' => $aluno,
      'gerenciars' => $gerenciars,
    ]);
  }

  public static function cadastrarPermissao($id_aluno){
    $aluno = Aluno::find($id_aluno);
    $perfis = Perfil::where('especializacao','=',NULL)->get();

    $especializacoes = Perfil::select('especializacao')
    ->where('especializacao', '!=', NULL)
    ->get()->toArray();

    $especializacoes = array_column($especializacoes, 'especializacao');

    return view('permissoes.cadastrar',[
      'aluno' => $aluno,
      'perfis' => $perfis,
      'especializacoes' => $especializacoes,
    ]);
  }

  public static function concederPermissao($id_aluno, $id_notificacao){
    $aluno = Aluno::find($id_aluno);
    $notificacao = Notificacao::find($id_notificacao);

    return view('permissoes.conceder',[
      'aluno' => $aluno,
      'notificacao' => $notificacao,
    ]);
  }

  public static function criarPermissao(Request $request){
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

    $perfil = Perfil::where('nome','=',$request->perfil)->where('especializacao','=',$request->especializacao)->first();

    if($perfil == NULL ){
      if($request->perfil == 'Profissional Externo'){
        $perfil = new Perfil();
        $perfil->nome = 'Profissional Externo';
        $perfil->especializacao = $request->especializacao;
        $perfil->save();
      }else{
        $perfil = Perfil::where('nome','=',$request->perfil)->where('especializacao','=',NULL)->first();
      }
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

    return redirect()->route('aluno.permissoes',['id_aluno' => $gerenciar->aluno_id])->with('Success','O usuário '.$user->name.' agora possui permissão.');
  }

  public function removerPermissao($id_aluno,$id_permissao){
    $gerenciar = Gerenciar::find($id_permissao);
    $gerenciar->delete();

    return redirect()->back()->with('Removed','Permissões removidas com sucesso.');
  }
}
