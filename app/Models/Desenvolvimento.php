<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desenvolvimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'sistema_linguistico',
        'outro_sistema_linguistico',
        'tecnologia_assistiva_utilizada',
        'recursos_equipamentos_necessarios' ,
        'implicacoes_especificidade_educacional' ,
        'outras_informacoes_relevantes',
        'percepcao',
        'atencao',
        'memoria',
        'linguagem',
        'raciocinio_logico',
        'desenvolvimento_capacidade_motora',
        'area_emocional_afetiva_social',
        'atividades_vida_autonoma',
        'pdi_id'
    ];
}
