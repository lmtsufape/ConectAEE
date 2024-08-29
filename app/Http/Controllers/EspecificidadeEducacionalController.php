<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEspecificidadeEducacionalRequest;
use App\Models\EspecificidadeEducacional;
use App\Models\Pdi;
use Illuminate\Http\Request;

class EspecificidadeEducacionalController extends Controller
{
    public function create_especificidade_educacional($pdi_id){
        $pdi = Pdi::find($pdi_id);
        return view('pdis.especificidades_educacionais', ['pdi' => $pdi]);
    }

    public function store(StoreEspecificidadeEducacionalRequest $request){
        $especificidade = EspecificidadeEducacional::create($request->all());

        return view('');
    }
}
