<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecursosMultifuncionais extends Model
{
    use HasFactory;

    protected $fillable = [
        'trabalho_area_cognitiva',
        'objetivo_area_cognitiva',
        'trabalho_area_social',
        'objetivo_area_social',
        'trabalho_area_motora',
        'objetivo_area_motora',
        'trabalho_altas_habilidade_superdotacao',
        'objetivo_altas_habilidade_superdotacao',
        'atividades_para_desenvolver_aluno_aee',
        'recursos_materias_equipamentos',
        'pdi_id',

    ];

    public function pdi(){
        return $this->belongsTo(Pdi::class);
    }
}
