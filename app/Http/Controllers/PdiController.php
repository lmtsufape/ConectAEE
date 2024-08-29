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

    public function index($aluno_id)
    {
        $pdis = Pdi::where('aluno_id', $aluno_id)->get();

        return view("pdis.index", [
            'pdis' => $pdis,
        ]);
    }

    public function create($aluno_id)
    {
        $pdi = $this->store($aluno_id);
        
        return redirect()->route('pdi.create_condicoes_saude', ['pdi_id' => $pdi->id]);
    }

    public function store($aluno_id)
    {
        if(Pdi::where('aluno_id', $aluno_id)->orderByDesc('created_at')->first()){

        }
        $pdi = Pdi::create(['aluno_id' => $aluno_id, 'user_id' => Auth::user()->id]);

        return $pdi;
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

    public function create_finalizacao(Request $request, $pdi_id){
        $pdi = Pdi::find($pdi_id);

        $pdi->update(['resumo_avaliacao_trimestral_aluno' => $request->all()]);

        return view('pdis.finalizacao', ['pdi' => $pdi]);
    }

}
