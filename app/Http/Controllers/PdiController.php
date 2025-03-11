<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Finalizacao;
use App\Models\Pdi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PdiController extends Controller
{

    public function index($aluno_id)
    {
        $aluno = Aluno::find($aluno_id);
        $pdis = $aluno->pdis()->latest()->paginate(10);

        return view("pdis.index", compact('pdis', 'aluno'));
    }

    public function create($aluno_id)
    {
        $pdi = $this->store($aluno_id);
        
        return redirect()->route('pdis.create_condicoes_saude', ['pdi_id' => $pdi->id]);
    }

    public function edit($pdi_id){
        $pdi = Pdi::find($pdi_id);
        
        return redirect()->route('pdis.create_condicoes_saude', ['pdi_id' => $pdi->id]);
    }

    public function store($aluno_id)
    {
        $pdi = Pdi::where('aluno_id', $aluno_id)->has('finalizacao')->orderByDesc('created_at')->with('condicaoSaude', 'desenvolvimento', 'especificidade', 'recursosMultifuncionais', 'finalizacao')->first();

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
            $novaEntidade = $pdi->finalizacao->replicate();
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
            Finalizacao::create( $request->merge(['pdi_id' => $pdi_id])->all());

            return redirect()->route('pdis.index', ['aluno_id' => $pdi->aluno_id]);
        }

        return redirect()->back()->with(['fail' => 'Falha na finalização']);
        
    }

    public function show($id_pdi)
    {
        $pdi = Pdi::find($id_pdi);
        return view('pdis.show', [
            'pdi' => $pdi,
        ]);
    }

    public function destroy($pdi_id)
    {
        $pdi = Pdi::findOrFail($pdi_id);
        if(!$pdi->finalizacao()->exists()){
            $pdi->delete();

            return redirect()->back()->with('success', 'O PDI foi deletado com sucesso!');;
        }

        return redirect()->back()->with('fail', 'Este PDI já foi finalizado e não pode ser excluído!');;
    }

    public function create_finalizacao(Request $request, $pdi_id){
        $pdi = Pdi::find($pdi_id);

        return view('pdis.finalizacao', ['pdi' => $pdi]);
    }

}
