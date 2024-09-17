<?php

namespace App\Http\Controllers;

use App\Enums\Escolaridade;
use App\Http\Requests\alunos\StoreAlunoRequest;
use App\Http\Requests\alunos\UpdateAlunoRequest;
use App\Models\User;
use App\Models\Notificacao;
use App\Notifications\ConcedeuPermissao;
use App\Notifications\NotificaPermissao;
use App\Models\Aluno;
use App\Models\Gerenciar;
use App\Models\Perfil;
use App\Models\Endereco;
use App\Models\Album;
use App\Models\Escola;
use App\Models\Gre;
use App\Models\Municipio;
use Illuminate\Support\Facades\Auth;
use Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AlunoController extends Controller
{

    
    public function index(): View
    {
        $alunos = Aluno::where('professor_responsavel', Auth::user()->id)->orderBy('nome', 'asc')->paginate(15);

        return view("alunos.index", [
            'alunos' => $alunos,
        ]);
    }
    

    public function show($aluno_id): View
    {
        $aluno = Aluno::find($aluno_id);

        $albuns = Album::where('aluno_id', $aluno->id)->paginate(15);

        return view("alunos.show", [
            'aluno' => $aluno,
            'albuns' => $albuns,
        ]);
    }



    public function create()
    {
        $gres = Gre::all();
        $municipios = Municipio::all();
        $escolas = Escola::all();
        $escolaridadeAluno = Escolaridade::anosEscolaridade();
        $escolaridadeAdulto = Escolaridade::escolaridadeAdulto(); 
        
        return view("alunos.create", compact(['gres', 'municipios', 'escolas', 'escolaridadeAluno', 'escolaridadeAdulto']));
    }


    public function store(StoreAlunoRequest $request)
    {

        DB::transaction(function() use ($request){

            $endereco = Endereco::create(['logradouro' => $request->logradouro,
                                'numero'  => $request->numero,
                                'bairro'  => $request->bairro,
                                'cidade'  => $request->cidade,
                                'cep'  => $request->cep]);
                                
            if ($request->imagem != null) {
                $nome = uniqid(date('HisYmd'));
                $extensao = $request->imagem->extension();
                $nomeArquivo = "{$nome}.{$extensao}";
                $request->imagem->storeAs('public/avatars', $nomeArquivo);
            }
                                
            $dados = array_merge(
                $request->except(['endereco']),
                ['endereco_id' => $endereco->id, 'professor_responsavel' => Auth::user()->id, 'imagem' => $nomeArquivo]
            );
    
            $aluno = Aluno::create($dados);
        });
        
        return redirect()->route('aluno.index');
    }

    public function edit($aluno_id)
    {

        $aluno = Aluno::find($aluno_id);
        $endereco = $aluno->endereco;
        $perfis = [[1, 'Responsável'], [2, 'Professor AEE']];
        $instituicoes = Auth::user()->instituicoes;

        return view("alunos.edit", [
            'aluno' => $aluno,
            'endereco' => $endereco,
            'instituicoes' => $instituicoes,
            'perfis' => $perfis
        ]);
    }

    public static function update(UpdateAlunoRequest $request)
    {
        $aluno = Aluno::find($request->aluno_id);

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

        return redirect()->route("aluno.gerenciar", ['aluno_id' => $request->aluno_id])->with('success', 'O Aluno ' . $aluno->nome . ' foi atualizado.');
    }
    public static function delete($aluno_id)
    {
        $aluno = Aluno::find($aluno_id);

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

            return view("alunos.buscarCPF", [
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
}
