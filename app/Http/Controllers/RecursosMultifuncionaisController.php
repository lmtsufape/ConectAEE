<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecursosMultifuncionaisRequest;
use App\Models\Pdi;
use App\Models\RecursosMultifuncionais;
use Illuminate\Http\Request;

class RecursosMultifuncionaisController extends Controller
{
    public function create_recursos_mult_funcionais($pdi_id){
        $pdi = Pdi::find($pdi_id);

        return view('pdis.recursos_mult_funcionais', ['pdi' => $pdi]);
    }

    public function store(StoreRecursosMultifuncionaisRequest $request, $pdi_id){
        $pdi = Pdi::find($pdi_id);

        if($pdi->recursosMultifuncionais->exists()){
            $pdi->recursosMultifuncionais->update($request->all());
     
            return redirect()->route('pdi.create_finalizacao', ['pdi_id' => $pdi->id]);
        }

        RecursosMultifuncionais::create(array_merge($request->all(), ['pdi_id' => $pdi_id]));
        
        return redirect()->route('pdi.create_finalizacao', ['pdi_id' => $pdi_id]);
    }
}
