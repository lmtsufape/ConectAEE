<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CondicaoSaude extends Model
{
    use HasFactory;

    protected $fillable = [
        'tem_diagnostico',
        'data_diagnostico',
        'resultado_diagnostico',
        'situacao_diagnostico',
        'tem_outras_condicoes',
        'outras_condicoes',
        'faz_uso_medicacao',
        'medicacoes',
        'tem_recomendacoes',
        'recomendacoes',
        'faz_acompanhamento',
        'acompanhamento',
        'pdi_id'   
    ];
}
