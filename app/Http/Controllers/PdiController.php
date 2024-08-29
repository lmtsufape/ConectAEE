<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Pdi;
use App\Models\pdiArquivo;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PdiController extends Controller
{
    public function create_finalizacao(){
        return view('pdis.finalizacao');
    }
    public function index($aluno_id)
    {
        $pdis = Pdi::where('aluno_id', $aluno_id)->get();
        $pdiArquivos = pdiArquivo::where('aluno_id', $aluno_id)->get();
        $aluno = Aluno::find($aluno_id);
        $pdi = DB::table('pdis')->latest('created_at')->where('user_id', '=', Auth::user()->id)->first();

        return view("pdis.index", [
            'pdis' => $pdis,
            'pdiArquivos' => $pdiArquivos,
            'aluno' => $aluno,
            'pdi' => $pdi,
        ]);

    }

    public function create($aluno_id)
    {
        $pdi = $this->store($aluno_id);
        
        return view('pdis.condicoes_saude', ['pdi' => $pdi]);
    }

    public function cadastrarArquivo($aluno_id)
    {
        $aluno = Aluno::find($aluno_id);

        return view('pdis.cadastrarArquivo', [
            'aluno' => $aluno,
        ]);
    }

    public function criarArquivo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'filenames' => 'mimes:doc,pdf,docx|max:2000',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        if ($request->hasfile('filename')) {
            $file = $request->file('filename');
            $name = 'pdi' . '-' . time() . '.' . $file->extension();
            $file->move(public_path() . '/pdis/'.$request->aluno_id.'/', $name);

        }


        $file = new pdiArquivo();
        $file->filename = $name;
        $file->aluno_id = $request->aluno_id;
        $file->user_id = Auth::user()->id;
        $file->save();

        return redirect()->route('pdi.listar', $request->aluno_id)->with('success', 'Seu arquivo foi adicionado com sucesso!');
    }

    public function download($id_pdiArquivo){
        $arquivo = pdiArquivo::find($id_pdiArquivo);
        return response()->download(public_path() . '/pdis/'.$arquivo->aluno_id.'/'.$arquivo->filename);
    }

    public function excluirArquivo($id_pdiArquivo){
        $arquivo = pdiArquivo::find($id_pdiArquivo);
        $arquivo->delete();
        if (file_exists(public_path() . '/pdis/'.$arquivo->aluno_id.'/'.$arquivo->filename)){
            unlink(public_path() . '/pdis/'.$arquivo->aluno_id.'/'.$arquivo->filename);
        }
        return redirect()->back()->with('success','O arquivo foi excluído.');
    }

    public function store($aluno_id)
    {
        if(Pdi::where('aluno_id', $aluno_id)->orderByDesc('created_at')->first()){

        }
        $pdi = Pdi::create(['aluno_id' => $aluno_id, 'user_id' => Auth::user()->id]);

        return $pdi;
    }

    public function gerarPdf(Request $request, $idPdi)
    {
        $pdi = Pdi::find($idPdi);
        $endereco = Aluno::find($pdi->aluno_id)->endereco;
        $pdf = PDF::loadView('/pdi/pdf', compact('pdi', 'endereco'));
        return $pdf->setPaper('a4')->stream('pdi' . '-' . time());
    }

    public function edit($id_pdi)
    {
        $pdi = Pdi::find($id_pdi);
        $aluno = Aluno::find($pdi->aluno_id);

        return view('pdis.edit', [
            'pdi' => $pdi,
            'aluno' => $aluno,
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomeMae' => ['required'],
            'nomePai' => ['nullable'],
            'numeroIrmaos' => ['required'],
            'nomeResponsavel' => ['required'],
            'bebeAguaSozinho' => ['required'],
            'nomeEscola' => ['required'],
            'professorRegular' => ['required'],
            'modalidadeEscolar' => ['required'],
            'anoEscolaridade' => ['required'],
            'comeSozinho' => ['required'],
            'escovaDentesSozinho' => ['required'],
            'banheiroSozinho' => ['required'],
            'banhoSozinho' => ['required'],
            'banheiroSozinho' => ['required'],
            'escovaDentesSozinho' => ['required'],
            'comeSozinho' => ['required'],
            'bebeAguaSozinho' => ['required'],
            'problemaGestacao' => ['required'],
            'descProbGestacao' => ['nullable'],
            'ambienteFamiliar' => ['required'],
            'aprendizagemEscolar' => ['required'],
            'recomendacoesSaude' => ['required'], ['min:3'],
            'diagnosticoSaude' => ['required'],
            'problemasSaude' => ['required'], ['min:3'],
            'descricaoMedicamentos' => ['nullable'],
            'sistemaLinguistico' => ['required'],
            'tipoRecursoUsado' => ['required'],
            'tipoRecursoProvidenciado' => ['required'],
            'implicacoesEspecificidades' => ['required'],
            'informacoesRelevantes' => ['nullable'],
            'avaliacaoMotora' => ['required'],
            'avaliacaoEmocional' => ['required'],
            'especificidadesObjetivo' => ['required'],

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $pdi = Pdi::find($request->id_pdi);

        $pdi->nomeMae = $request->nomeMae;
        $pdi->nomePai = $request->nomePai;
        $pdi->numeroIrmaos = $request->numeroIrmaos;
        $pdi->nomeResponsavel = $request->nomeResponsavel;
        $pdi->bebeAguaSozinho = $request->bebeAguaSozinho;
        $pdi->nomeEscola = $request->nomeEscola;
        $pdi->professorRegular = $request->professorRegular;
        $pdi->modalidadeEscolar = $request->modalidadeEscolar;
        $pdi->anoEscolaridade = $request->anoEscolaridade;
        $pdi->comeSozinho = $request->comeSozinho;
        $pdi->escovaDentesSozinho = $request->escovaDentesSozinho;
        $pdi->banheiroSozinho = $request->banheiroSozinho;
        $pdi->banhoSozinho = $request->banhoSozinho;
        $pdi->banheiroSozinho = $request->banheiroSozinho;
        $pdi->escovaDentesSozinho = $request->escovaDentesSozinho;
        $pdi->comeSozinho = $request->comeSozinho;
        $pdi->bebeAguaSozinho = $request->bebeAguaSozinho;
        $pdi->problemaGestacao = $request->problemaGestacao;
        $pdi->descProbGestacao = $request->descProbGestacao;
        $pdi->ambienteFamiliar = $request->ambienteFamiliar;
        $pdi->aprendizagemEscolar = $request->aprendizagemEscolar;
        $pdi->recomendacoesSaude = $request->recomendacoesSaude;
        $pdi->diagnosticoSaude = $request->diagnosticoSaude;
        $pdi->problemasSaude = $request->problemasSaude;
        $pdi->descricaoMedicamentos = $request->descricaoMedicamentos;
        $pdi->sistemaLinguistico = $request->sistemaLinguistico;
        $pdi->tipoRecursoUsado = $request->tipoRecursoUsado;
        $pdi->tipoRecursoProvidenciado = $request->tipoRecursoProvidenciado;
        $pdi->implicacoesEspecificidades = $request->implicacoesEspecificidades;
        $pdi->informacoesRelevantes = $request->informacoesRelevantes;
        $pdi->avaliacaoMotora = $request->avaliacaoMotora;
        $pdi->avaliacaoEmocional = $request->avaliacaoEmocional;
        $pdi->especificidadesObjetivo = $request->especificidadesObjetivo;
        $pdi->update();

        return redirect()->route("pdi.index", $pdi->aluno_id)->with('success', 'O PDI foi cadastrado');
    }

    public function show($id_pdi)
    {
        $pdi = Pdi::find($id_pdi);
        return view('pdis.ver', [
            'pdi' => $pdi,
        ]);
    }

    public function delete($id_pdi)
    {
        $pdi = Pdi::find($id_pdi);
        $aluno = $pdi->aluno_id;
        $pdi->delete();

        return redirect()->route("pdi.listar", $aluno)->with('success', 'O PDI foi excluído.');;
    }


}
