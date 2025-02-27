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
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class AlunoController extends Controller
{

    
    public function index(): View
    {   
        if(Auth::user()->hasAnyRoles(['Administrador'])){
            $alunos = QueryBuilder::for(Aluno::class)
            ->allowedFilters([
                AllowedFilter::exact('escola_id'),
                AllowedFilter::exact('gre_id', 'escola.municipio.gres.id'),
                AllowedFilter::exact('municipio_id', 'endereco.municipio.id')
            ])
            ->orderBy('escola_id', 'asc')
            ->paginate(15)->appends(request()->query());
            
            $escolas = Escola::all();
            $gres = Gre::all();
            $municipios = Municipio::all();

            return view("alunos.index_admin", compact('alunos', 'escolas', 'gres', 'municipios'));
        }

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
        $gres = Gre::select('gres.id', 'gres.nome')
        ->with([
            'municipios' => function ($query) {
                $query->select('municipios.id', 'municipios.nome')
                      ->orderBy('municipios.nome');
            },
            'municipios.escolas' => function ($query) {
                $query->select('escolas.id', 'escolas.nome', 'escolas.municipio_id')
                      ->orderBy('escolas.nome');
            }
        ])
        ->orderBy('gres.nome') // Ordena as Gres pelo nome
        ->get();    
    
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
                                'municipio_id'  => $request->aluno_municipio_id,
                                'cep'  => $request->cep]);
                                
            
                                
            $dados = array_merge(
                $request->except(['endereco']),
                ['endereco_id' => $endereco->id, 'professor_responsavel' => Auth::user()->id]
            );
    
            $aluno = Aluno::create($dados);

            if ($request->file('imagem')) {
                $nome = 'perfil_'. now()->format('d-m-Y_H-i-s');
                $extensao = $request->imagem->getClientOriginalExtension();
                $nomeArquivo = "{$nome}.{$extensao}";
                $aluno->imagem = $request->imagem->storeAs('alunos/'. $aluno->id. '/images', $nomeArquivo);
            }
            if($request->file('anexos_laudos')){
                $aluno->anexos_laudos = now()->format('d-m-Y_H-i-s') . $request->anexos_laudos->getClientOriginalExtension();

            }
            $aluno->update();
        });
        
        return redirect()->route('alunos.index')->with('success', 'Aluno criado com sucesso!');
    }

    public function edit($aluno_id)
    {
        $aluno = Aluno::find($aluno_id);
        $gres = Gre::select('gres.id', 'gres.nome')
        ->with([
            'municipios' => function ($query) {
                $query->select('municipios.id', 'municipios.nome')
                      ->orderBy('municipios.nome');
            },
            'municipios.escolas' => function ($query) {
                $query->select('escolas.id', 'escolas.nome', 'escolas.municipio_id')
                      ->orderBy('escolas.nome');
            }
        ])
        ->orderBy('gres.nome')
        ->get();    
    
        $municipios = Municipio::all();
        $escolas = Escola::all();
        $escolaridadeAluno = Escolaridade::anosEscolaridade();
        $escolaridadeAdulto = Escolaridade::escolaridadeAdulto(); 

        return view("alunos.edit", compact('aluno', 'gres', 'municipios', 'escolas', 'escolaridadeAluno', 'escolaridadeAdulto'));
    }

    public static function update(UpdateAlunoRequest $request, $aluno_id)
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

        if ($request->file('imagem')) {
            $nome = 'perfil_'. now()->format('d-m-Y_H-i-s');
            $extensao = $request->imagem->getClientOriginalExtension();
            $nomeArquivo = "{$nome}.{$extensao}";
            $aluno->imagem = $request->imagem->storeAs('alunos/'. $aluno->id. '/images', $nomeArquivo);
        }
        if($request->file('anexos_laudos')){
            $aluno->anexos_laudos = now()->format('d-m-Y_H-i-s') . $request->anexos_laudos->getClientOriginalExtension();

        }
        $aluno->update();

        return redirect()->route("alunos.index")->with('success', 'O Aluno ' . $aluno->nome . ' foi atualizado.');
    }
    public function destroy($aluno_id)
    {
        $aluno = Aluno::findOrFail($aluno_id);

        $aluno->delete();

        return redirect()->route("alunos.index")->with('success', 'Aluno deletado com sucesso!');
    }

    public static function buscarAluno(Request $request)
    {

        $gerenciars = Auth::user()->gerenciars;
        $ids_alunos = array();

        foreach ($gerenciars as $gerenciar) {
            array_push($ids_alunos, $gerenciar->aluno_id);
        }

        $alunos = Aluno::whereIn('id', $ids_alunos)->where('nome', 'ilike', '%' . $request->termo . '%')->paginate(12);

        return view("alunos.index", [
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
                return redirect()->route("alunos.cadastrar")->with('cpf', $cpf);
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
