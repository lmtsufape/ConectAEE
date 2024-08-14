<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlunoRequest;
use App\Http\Requests\UpdateAlunoRequest;
use App\Models\User;
use App\Models\Notificacao;
use App\Notifications\NovoAluno;
use App\Notifications\ConcedeuPermissao;
use App\Notifications\NotificaPermissao;
use App\Models\Aluno;
use App\Models\Gerenciar;
use App\Models\Perfil;
use App\Models\Endereco;
use App\Models\ForumAluno;
use App\Models\MensagemForumAluno;
use App\Models\Album;
use App\Models\Escola;
use Illuminate\Support\Facades\Auth;
use Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AlunoController extends Controller
{

    
    public function index()
    {
        $alunos = Aluno::where('professor_responsavel', Auth::user()->id)->orderBy('nome', 'asc')->paginate(15);
        
        return view("alunos.index", [
            'alunos' => $alunos,
        ]);
    }

    public function show($aluno_id): View
    {
        $aluno = Aluno::find($aluno_id);

        $mensagens = MensagemForumAluno::where('forum_aluno_id', '=', $aluno->forum->id)->orderBy('id', 'desc')->get();

        foreach ($mensagens as $mensagem) {
            $img = strpos($mensagem->texto, '<img');
            $video = strpos($mensagem->texto, '<iframe');

            if ($img) {
                $mensagem->texto = str_replace('<img', '<img style="width:100%"', $mensagem->texto);
            }

            if ($video) {
                $mensagem->texto = str_replace('<iframe', '<iframe style="width:100%"', $mensagem->texto);
            }
        }

        $albuns = Album::where('aluno_id', $aluno->id)->paginate(15);

        return view("alunos.show", [
            'aluno' => $aluno,
            'mensagens' => $mensagens,
            'albuns' => $albuns,
        ]);
    }
    
    public function create()
    {
        $escolas = Escola::all();
        
        return view("aluno.create", [
            'escolas'
        ]);
    }


    public function store(StoreAlunoRequest $request)
    {

        $aluno = new Aluno();

        if ($request->imagem != null) {
            $nome = uniqid(date('HisYmd'));
            $extensao = $request->imagem->extension();
            $nomeArquivo = "{$nome}.{$extensao}";
            $request->imagem->storeAs('public/avatars', $nomeArquivo);
            $aluno->imagem = $nomeArquivo;
        }
        
        Aluno::create($request->all());

        $aluno->escola()->attach($request->instituicoes);
        
        $forum = new ForumAluno();
        $forum->aluno_id = $aluno->id;
        $forum->save();

        
        $notificacao = new Notificacao();
        $notificacao->aluno_id = $gerenciar->aluno_id;
        $notificacao->remetente_id = Auth::user()->id;
        $notificacao->destinatario_id = $gerenciar->user_id;
        $notificacao->perfil_id = $gerenciar->perfil_id;
        $notificacao->lido = false;
        $notificacao->tipo = 2;
        $notificacao->save();
        //Enviando email de notificação
        $user = User::find($notificacao->destinatario_id);
        Notification::route('mail', $user->email)->notify(new NovoAluno());
        
        if ($request->perfil == 2 && $request->cadastrado == "false") {
            return redirect()->route("aluno.index")->with('success', 'O Aluno ' . $aluno->nome . ' foi cadastrado.')->with('password', 'A senha provisória do usuário ' . $request->username . ' é ' . $password . '.');
        } else {
            return redirect()->route("aluno.index")->with('success', 'O Aluno ' . $aluno->nome . ' foi cadastrado.');
        }
    }
    
   
    public static function edit($id_aluno)
    {

        $aluno = Aluno::find($id_aluno);
        $endereco = $aluno->endereco;
        $perfis = [[1, 'Responsável'], [2, 'Professor AEE']];
        $instituicoes = Auth::user()->instituicoes;

        return view("aluno.editar", [
            'aluno' => $aluno,
            'endereco' => $endereco,
            'instituicoes' => $instituicoes,
            'perfis' => $perfis
        ]);
    }

    public static function update(UpdateAlunoRequest $request)
    {

        $validator = Validator::make($request->all(), [
            'instituicoes' => ['required'],
            'imagem.*' => 'image|mimes:jpeg,png,jpg,jpe|max:3000',
            'nome' => ['required', 'min:2', 'max:191'],
            'sexo' => ['required'],
            'cid' => ['nullable', 'regex:/(^([a-zA-z])(\d)(\d)(\d)$)/u'],
            'descricaoCid' => ['required_with:cid'],
            'observacao' => ['nullable'],
            'data_nascimento' => ['required', 'date', 'before:today', 'after:01/01/1900'],
            'cep' => ['required'],
            'rua' => ['required'],
            'numero' => ['required', 'numeric'],
            'bairro' => ['required'],
            'cidade' => ['required'],
            'estado' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $aluno = Aluno::find($request->id_aluno);

        $endereco = Endereco::find($request->id_endereco);
        $endereco->cep = $request->cep;
        $endereco->rua = $request->rua;
        $endereco->numero = $request->numero;
        $endereco->bairro = $request->bairro;
        $endereco->cidade = $request->cidade;
        $endereco->estado = $request->estado;
        $endereco->update();

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

        return redirect()->route("aluno.gerenciar", ['id_aluno' => $request->id_aluno])->with('success', 'O Aluno ' . $aluno->nome . ' foi atualizado.');
    }
    public static function excluir($id_aluno)
    {
        $aluno = Aluno::find($id_aluno);

        $gerenciars = Gerenciar::where('aluno_id', '=', $aluno->id)->get();

        foreach ($gerenciars as $gerenciar) {
            $gerenciar->delete();
        }

        $aluno->delete();

        return redirect()->route("aluno.index")->with('success', 'O aluno ' . $aluno->nome . ' foi excluído.');
    }

    public static function buscarAluno(Request $request)
    {

        $gerenciars = Auth::user()->gerenciars;
        $ids_alunos = array();

        foreach ($gerenciars as $gerenciar) {
            array_push($ids_alunos, $gerenciar->aluno_id);
        }

        $alunos = Aluno::whereIn('id', $ids_alunos)->where('nome', 'ilike', '%' . $request->termo . '%')->paginate(12);

        return view("aluno.index", [
            'alunos' => $alunos,
            'termo' => $request->termo
        ]);

    }

    public function buscarCPF(Request $request)
    {
        try {
            \App\Validator\CpfValidator::validate ($request->all());
            $cpf = $request->cpf;
            $aluno = Aluno::where('cpf', '=', $cpf)->first();
            $botaoAtivo = false;

            if ($aluno == null) {
                return redirect()->route("aluno.cadastrar")->with('cpf', $cpf);
            } else {
                $gerenciars = $aluno->gerenciars;
                foreach ($gerenciars as $gerenciar) {
                    if ($gerenciar->user->id == Auth::user()->id && $gerenciar->tipoUsuario == 3) {
                        $botaoAtivo = true;
                    }
                }
            }

            return view("aluno.buscarCPF", [
                'aluno' => $aluno,
                'cpf' => $cpf,
                'botaoAtivo' => $botaoAtivo
            ]);
        }catch (\App\Validator\ValidationException $exception){
            return redirect('/aluno/buscar')
                ->withErrors($exception->getValidator())
                ->withInput();
        }

    }


    

    public static function requisitarPermissao($cpf)
    {
        $aluno = Aluno::where('cpf', '=', $cpf)->first();

        $perfis = Perfil::where('especializacao', '=', NULL)->get();

        $especializacoes = Perfil::select('especializacao')
            ->where('especializacao', '!=', NULL)
            ->get()->toArray();

        $especializacoes = array_column($especializacoes, 'especializacao');

        return view('permissoes.requisitar', [
            'aluno' => $aluno,
            'perfis' => $perfis,
            'especializacoes' => $especializacoes,
        ]);
    }

    public static function notificarPermissao(Request $request)
    {

        $rules = array(
            'perfil' => 'required',
            'especializacao' => 'required_if:perfil,Profissional Externo',
        );
        $messages = array(
            'perfil.required' => 'Selecione um perfil.',
            'especializacao.required_if' => 'Necessário inserir uma especialização.',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $aluno = Aluno::find($request->id_aluno);
        $gerenciars = $aluno->gerenciars;

        $perfil = Perfil::where('nome', '=', $request->perfil)->where('especializacao', '=', $request->especializacao)->first();

        if ($perfil == NULL) {
            if ($request->perfil == 'Profissional Externo') {
                $perfil = new Perfil();
                $perfil->nome = 'Profissional Externo';
                $perfil->especializacao = $request->especializacao;
                $perfil->save();
            } else {
                $perfil = Perfil::where('nome', '=', $request->perfil)->where('especializacao', '=', NULL)->first();
            }
        }

        foreach ($gerenciars as $gerenciar) {
            if ($gerenciar->tipoUsuario == 3 and ($gerenciar->perfil_id == 1 or $gerenciar->perfil_id == 2)) {
                $notificacao = new Notificacao();
                $notificacao->aluno_id = $aluno->id;
                $notificacao->remetente_id = Auth::user()->id;
                $notificacao->destinatario_id = $gerenciar->user_id;
                $notificacao->perfil_id = $perfil->id;
                $notificacao->lido = false;
                $notificacao->tipo = 1;
                $notificacao->save();
                //Enviando email de notificação
                $user = User::find($notificacao->destinatario_id);
                Notification::route('mail', $user->email)->notify(new NotificaPermissao());

            }
        }

        return redirect()->route("aluno.index")->with('success', 'Seu pedido de acesso à ' . $aluno->nome . ' foi enviado. Aguarde aceitação.');
    }

    public static function gerenciarPermissoes($id_aluno)
    {
        $aluno = Aluno::find($id_aluno);
        $gerenciars = $aluno->gerenciars;

        $names = [];
        foreach ($gerenciars as $g) {
            $names[$g->user->name] = $g->id;
        }

        ksort($names);
        $order = array_values($names);
        $gerenciars = $gerenciars->sortBy(function ($model) use ($order) {
            return array_search($model->getKey(), $order);
        });

        return view('permissoes.listar', [
            'aluno' => $aluno,
            'gerenciars' => $gerenciars,
        ]);
    }

    public static function cadastrarPermissao($id_aluno)
    {
        $aluno = Aluno::find($id_aluno);
        $perfis = Perfil::where('especializacao', '=', NULL)->get();
        $usuarios = User::all()->toArray();
        $usuarios = array_column($usuarios, 'name');

        $especializacoes = Perfil::select('especializacao')
            ->where('especializacao', '!=', NULL)
            ->get()->toArray();
        $especializacoes = array_column($especializacoes, 'especializacao');

        return view('permissoes.cadastrar', [
            'aluno' => $aluno,
            'perfis' => $perfis,
            'especializacoes' => $especializacoes,
            'usuarios' => $usuarios,
        ]);
    }

    public static function concederPermissao($id_notificacao)
    {
        $notificacao = Notificacao::find($id_notificacao);
        $aluno = $notificacao->aluno;

        return view('permissoes.conceder', [
            'aluno' => $aluno,
            'notificacao' => $notificacao,
        ]);
    }

    public static function criarPermissao(Request $request)
    {
        //Validação dos dados
        $rules = array(
            'username' => 'required|exists:users,username',
            'perfil' => 'required',
            'especializacao' => 'required_if:perfil,Profissional Externo',
        );
        $messages = array(
            'username.required' => 'Necessário inserir um nome de usuário.',
            'name.exists' => 'O usuário em questão não está cadastrado.',
            'perfil.required' => 'Selecione um perfil.',
            'especializacao.required_if' => 'Necessário inserir uma especialização.',
        );
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        //Se já existe a relação
        $user = User::where('username', '=', $request->username)->first();

        if ((Gerenciar::where('user_id', '=', $user->id)->where('aluno_id', '=', $request->id_aluno))->first()) {
            $validator->errors()->add('username', 'O usuário já possui permissões de acesso ao aluno.');
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        //Criação do Gerencimento
        $gerenciar = new Gerenciar();
        $gerenciar->user_id = $user->id;
        $gerenciar->aluno_id = (int)$request->id_aluno;

        $perfil = Perfil::where('nome', '=', $request->perfil)->where('especializacao', '=', $request->especializacao)->first();

        if ($perfil == NULL) {
            if ($request->perfil == 'Profissional Externo') {
                $perfil = new Perfil();
                $perfil->nome = 'Profissional Externo';
                $perfil->especializacao = $request->especializacao;
                $perfil->save();
            } else {
                $perfil = Perfil::where('nome', '=', $request->perfil)->where('especializacao', '=', NULL)->first();
            }
        }

        $gerenciar->perfil_id = $perfil->id;
        if ($request->exists('tipoUsuario') || $request->perfil == 'Responsável') {
            $gerenciar->tipoUsuario = $request->tipoUsuario;
        }

        $gerenciar->save();

        $notificacao = new Notificacao();
        $notificacao->aluno_id = $gerenciar->aluno_id;
        $notificacao->remetente_id = Auth::user()->id;
        $notificacao->destinatario_id = $gerenciar->user_id;
        $notificacao->perfil_id = $gerenciar->perfil_id;
        $notificacao->lido = false;
        $notificacao->tipo = 2;
        $notificacao->save();
        //Enviando email de notificação
        $user = User::find($notificacao->destinatario_id);
        Notification::route('mail', $user->email)->notify(new ConcedeuPermissao());


        return redirect()->route('aluno.permissoes', ['id_aluno' => $gerenciar->aluno_id])->with('Success', 'O usuário ' . $user->name . ' agora possui permissão de acesso ao aluno.');
    }

    public static function atualizarPermissao(Request $request)
    {
        //Validação dos dados
        $rules = array(
            'perfil' => 'required',
            'especializacao' => 'required_if:perfil,Profissional Externo',
        );
        $messages = array(
            'username.exists' => 'O usuário em questão não está cadastrado.',
            'perfil.required' => 'Selecione um perfil.',
            'especializacao.required_if' => 'Necessário inserir uma especialização.',
        );

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        //Criação do Gerencimento
        $gerenciar = Gerenciar::find($request->id_permissao);

        $perfil = Perfil::where('nome', '=', $request->perfil)->where('especializacao', '=', $request->especializacao)->first();

        if ($perfil == NULL) {
            if ($request->perfil == 'Profissional Externo') {
                $perfil = new Perfil();
                $perfil->nome = 'Profissional Externo';
                $perfil->especializacao = $request->especializacao;
                $perfil->save();
            } else {
                $perfil = Perfil::where('nome', '=', $request->perfil)->where('especializacao', '=', NULL)->first();
            }
        }

        $gerenciar->perfil_id = $perfil->id;

        if ($request->exists('tipoUsuario') || $request->perfil == 'Responsável') {
            $gerenciar->tipoUsuario = $request->tipoUsuario;
        }

        $gerenciar->update();

        $user = $gerenciar->user;

        // $notificacao = new Notificacao();
        // $notificacao->aluno_id = $gerenciar->aluno_id;
        // $notificacao->remetente_id = Auth::user()->id;
        // $notificacao->destinatario_id = $gerenciar->user_id;
        // $notificacao->perfil_id = $gerenciar->perfil_id;
        // $notificacao->lido = false;
        // $notificacao->tipo = 2;
        // $notificacao->save();

        return redirect()->route('aluno.permissoes', ['id_aluno' => $gerenciar->aluno_id])->with('Success', 'A permissão de acesso do usuário ' . $user->name . ' foi alterada.');
    }


    public function editarPermissao($id_permissao)
    {
        $perfis = Perfil::where('especializacao', '=', NULL)->get();

        $especializacoes = Perfil::select('especializacao')
            ->where('especializacao', '!=', NULL)
            ->get()->toArray();

        $especializacoes = array_column($especializacoes, 'especializacao');

        $gerenciar = Gerenciar::find($id_permissao);
        $aluno = $gerenciar->aluno;

        return view('permissoes.editar', [
            'aluno' => $aluno,
            'perfis' => $perfis,
            'gerenciar' => $gerenciar,
            'especializacoes' => $especializacoes,
        ]);

        // return redirect()->back()->with('Removed','Permissões removidas com sucesso.');
    }

    public function removerPermissao($id_permissao)
    {
        $gerenciar = Gerenciar::find($id_permissao);
        $gerenciar->delete();

        return redirect()->back()->with('Removed', 'Permissões removidas com sucesso.');
    }
}
