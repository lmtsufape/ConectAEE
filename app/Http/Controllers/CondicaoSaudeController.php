<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCondicaoSaudeRequest;
use App\Models\CondicaoSaude;
use App\Models\Pdi;
use Illuminate\Http\Request;

class CondicaoSaudeController extends Controller
{
    public function create_condicoes_saude($pdi_id){
        $pdi = Pdi::find($pdi_id);

        return view('pdis.condicoes_saude', ['pdi' => $pdi]);
    }

    public function store(StoreCondicaoSaudeRequest $request, $pdi_id){
        $condicao_saude = CondicaoSaude::create($request->all());

        return view('');
    }
}
