<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Pdi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PdiController extends Controller
{

    public function index($aluno_id)
    {
        $pdis = Pdi::where('aluno_id', $aluno_id)->get();
        $aluno = Aluno::find($aluno_id);
        return view("pdis.index", [
            'pdis' => $pdis,
            'aluno' => $aluno,
        ]);
    }

    public function create($aluno_id)
    {
        $pdi = $this->store($aluno_id);
        
        return redirect()->route('pdi.create_condicoes_saude', ['pdi_id' => $pdi->id]);
    }

    public function edit($pdi_id){
        $pdi = Pdi::find($pdi_id);
        
        return redirect()->route('pdi.create_condicoes_saude', ['pdi_id' => $pdi->id]);
    }

    public function store($aluno_id)
    {
        $pdi = Pdi::where('aluno_id', $aluno_id)->orderByDesc('created_at')->with('condicaoSaude', 'desenvolvimento', 'especificidade', 'recursosMultifuncionais')->first();

        if($pdi){
            $novoPdi = $pdi->replicate();
            $novoPdi->save();
            
            $novaEntidade = $pdi->condicaoSaude->replicate();
            $novaEntidade->pdi_id = $novoPdi->id;
            $novaEntidade->save(); 
            $novaEntidade = $pdi->desenvolvimento->replicate();
            $novaEntidade->pdi_id = $novoPdi->id;
            $novaEntidade->save(); 
            $novaEntidade = $pdi->especificidade->replicate();
            $novaEntidade->pdi_id = $novoPdi->id;
            $novaEntidade->save(); 
            $novaEntidade = $pdi->recursosMultifuncionais->replicate();
            $novaEntidade->pdi_id = $novoPdi->id;
            $novaEntidade->save(); 
            
            return $novoPdi;
        }
        $pdi = Pdi::create(['aluno_id' => $aluno_id, 'user_id' => Auth::user()->id]);

        return $pdi;
    }

    public function finalizacao(Request $request, $pdi_id){
        $pdi = Pdi::find($pdi_id);
        if($pdi->condicaoSaude()->exists() && $pdi->desenvolvimento()->exists() && $pdi->especificidade()->exists() && $pdi->recursosMultifuncionais()->exists()){
            $pdi->resumo_avaliacao_trimestral_aluno = $request->resumo_avaliacao_trimestral_aluno;//implementado desta forma para garantir a data que o formulário foi submetido.
            $pdi->save();

            return redirect()->route('pdi.index', ['aluno_id' => $pdi->aluno_id]);
        }

        return redirect()->back()->with(['fail' => 'Falha na finalização']);
        
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

        return view('pdis.finalizacao', ['pdi' => $pdi]);
    }

}
