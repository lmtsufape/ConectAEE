<?php

namespace App\Http\Controllers;

use App\Enums\SistemaLinguistico;
use App\Http\Requests\StoreDesenvolvimentoRequest;
use App\Models\Desenvolvimento;
use App\Models\Pdi;
use Illuminate\Http\Request;

class DesenvolvimentoController extends Controller
{
    public function create_desenvolvimento_estudante($pdi_id){
        $pdi = Pdi::find($pdi_id);
        $sistemas_linguisticos = SistemaLinguistico::getValues();

        return view('pdis.desenvolvimento_estudante', ['pdi' => $pdi, 'sistemas_linguisticos' => $sistemas_linguisticos]);
    }

    public function store(StoreDesenvolvimentoRequest $request, $pdi_id){
        Desenvolvimento::create(attributes: array_merge($request->all(), ['pdi_id' => $pdi_id]));

        return redirect()->route('pdi.create_especificidade_educacional', ['pdi_id' => $pdi_id]);
    }
}
