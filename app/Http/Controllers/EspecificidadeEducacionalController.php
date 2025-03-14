<?php

namespace App\Http\Controllers;

use App\Enums\FrequenciaAtendimentos;
use App\Enums\OrganizacaoTipoAEE;
use App\Enums\ProfissionaisEducacaoNecessarios;
use App\Enums\TipoSala;
use App\Http\Requests\StoreEspecificidadeEducacionalRequest;
use App\Models\EspecificidadeEducacional;
use App\Models\Pdi;
use Illuminate\Http\Request;

class EspecificidadeEducacionalController extends Controller
{
    public function create_especificidade_educacional($pdi_id){
        $pdi = Pdi::find($pdi_id);
        $organizacoes = OrganizacaoTipoAEE::getValues();
        $tipo_salas = TipoSala::getValues();
        $atendimentos = FrequenciaAtendimentos::getValues();
        $profissionais = ProfissionaisEducacaoNecessarios::getValues();

        return view('pdis.especificidades_educacionais', compact('pdi', 'organizacoes', 'tipo_salas', 'atendimentos', 'profissionais'));
    }

    public function store(StoreEspecificidadeEducacionalRequest $request, $pdi_id){
        $pdi = Pdi::find($pdi_id);

        if($pdi->especificidade){
            $pdi->especificidade->update($request->all());

            return redirect()->route('pdis.create_recursos_mult_funcionais', ['pdi_id' => $pdi->id]);
        }

        EspecificidadeEducacional::create(array_merge($request->all(), ['pdi_id' => $pdi_id]));

        return redirect()->route('pdis.create_recursos_mult_funcionais', ['pdi_id' => $pdi_id]);
    }
}
