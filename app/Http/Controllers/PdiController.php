<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Pdi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PdiController extends Controller
{
    public static function listar($id_aluno)
    {
        $pdis = Pdi::all()->where('aluno_id', "=", $id_aluno);
        $aluno = Aluno::find($id_aluno);

        return view("pdi.listar", [
            'pdis' => $pdis,
            'aluno' => $aluno
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

    public static function criar(Request $request)
    {
        $validator = Validator::make($request->all(), [
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
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $pdi = new Pdi();

        $pdi->user_id = \Auth::user()->id;
        $pdi->aluno_id = $request->aluno_id;
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

        return redirect()->route("pdi.listar", $pdi->aluno_id)->with('success','O PDI foi cadastrado');
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
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $pdi = Pdi::find($request->id_pdi);

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

        return redirect()->route("pdi.listar", $pdi->aluno_id)->with('success','O PDI foi cadastrado');
    }

    public static function ver($id_pdi){
        $pdi = Pdi::find($id_pdi);
        return view('pdi.ver', [
            'pdi' => $pdi,
        ]);
    }

    public static function excluir($id_pdi){
        $pdi = Pdi::find($id_pdi);
        $aluno = $pdi->aluno_id;
        $pdi->delete();

        return redirect()->route("pdi.listar", $aluno)->with('success','O PDI foi excluído.');;
    }


}
