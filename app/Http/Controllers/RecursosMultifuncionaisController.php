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
        $recursosMulti = RecursosMultifuncionais::create($request->all());

        return redirect()->route('pdi.recursos_mult_funcionais');
    }
}
