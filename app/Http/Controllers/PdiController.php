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
    public static function listar($id_aluno)
    {
        $pdis = Pdi::all()->where('aluno_id', "=", $id_aluno);
        $pdiArquivos = pdiArquivo::all()->where('aluno_id', "=", $id_aluno);
        $aluno = Aluno::find($id_aluno);
        $pdi = DB::table('pdis')->latest('created_at')->where('user_id', '=', Auth::user()->id)->first();

        return view("pdi.listar", [
            'pdis' => $pdis,
            'pdiArquivos' => $pdiArquivos,
            'aluno' => $aluno,
            'pdi' => $pdi,
        ]);

    }

    public static function cadastrar($id_aluno)
    {
        $aluno = Aluno::find($id_aluno);
        $pdi = DB::table('pdis')->latest('created_at')->where('user_id', '=', Auth::user()->id)->first();
        return view('pdi.cadastrar', [
            'aluno' => $aluno,
            'pdi' => $pdi,
        ]);
    }

    public static function cadastrarArquivo($id_aluno)
    {
        $aluno = Aluno::find($id_aluno);
        return view('pdi.cadastrarArquivo', [
            'aluno' => $aluno,
        ]);
    }

    public static function criarArquivo(Request $request)
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

    public static function download($id_pdiArquivo){
        $arquivo = pdiArquivo::find($id_pdiArquivo);
        return response()->download(public_path() . '/pdis/'.$arquivo->aluno_id.'/'.$arquivo->filename);
    }

    public static function excluirArquivo($id_pdiArquivo){
        $arquivo = pdiArquivo::find($id_pdiArquivo);
        $arquivo->delete();
        if (file_exists(public_path() . '/pdis/'.$arquivo->aluno_id.'/'.$arquivo->filename)){
            unlink(public_path() . '/pdis/'.$arquivo->aluno_id.'/'.$arquivo->filename);
        }
        return redirect()->back()->with('success','O arquivo foi excluído.');
    }

    public static function criar(Request $request)
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

        $pdi = new Pdi();

        $pdi->user_id = Auth::user()->id;
        $pdi->aluno_id = $request->aluno_id;
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
        $pdi->save();

        return redirect()->route("pdi.listar", $pdi->aluno_id)->with('success', 'O PDI foi cadastrado');
    }

    public function gerarPdf(Request $request, $idPdi)
    {
        $pdi = Pdi::find($idPdi);
        $endereco = Aluno::find($pdi->aluno_id)->endereco;
        $pdf = PDF::loadView('/pdi/pdf', compact('pdi', 'endereco'));
        return $pdf->setPaper('a4')->stream('pdi' . '-' . time());
    }

    public static function editar($id_pdi)
    {
        $pdi = Pdi::find($id_pdi);
        $aluno = Aluno::find($pdi->aluno_id);
        return view('pdi.editar', [
            'pdi' => $pdi,
            'aluno' => $aluno,
        ]);
    }

    public static function atualizar(Request $request)
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

        return redirect()->route("pdi.listar", $pdi->aluno_id)->with('success', 'O PDI foi cadastrado');
    }

    public static function ver($id_pdi)
    {
        $pdi = Pdi::find($id_pdi);
        return view('pdi.ver', [
            'pdi' => $pdi,
        ]);
    }

    public static function excluir($id_pdi)
    {
        $pdi = Pdi::find($id_pdi);
        $aluno = $pdi->aluno_id;
        $pdi->delete();

        return redirect()->route("pdi.listar", $aluno)->with('success', 'O PDI foi excluído.');;
    }


}
