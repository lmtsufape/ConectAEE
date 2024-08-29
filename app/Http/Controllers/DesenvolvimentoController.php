<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDesenvolvimentoRequest;
use App\Models\Desenvolvimento;
use App\Models\Pdi;
use Illuminate\Http\Request;

class DesenvolvimentoController extends Controller
{
    public function create_desenvolvimento_estudante($pdi_id){
        $pdi = Pdi::find($pdi_id);

        return view('pdis.desenvolvimento_estudante', ['pdi' => $pdi]);
    }

    public function store(StoreDesenvolvimentoRequest $request){
        $desenvolvimento = Desenvolvimento::create($request->all());

        return redirect()->route('pdi.desenvolvimento_estudante');
    }
}
