<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspecificidadeEducacional extends Model
{
    use HasFactory;

    protected $fillable = [
        'escola_acoes_existentes',
            'escola_acoes_desenvolvidas',
            'escola_responsaveis_acoes',
            'sala_aula_acoes_existentes',
            'sala_aula_acoes_desenvolvidas',
            'sala_aula_responsaveis_acoes',
            'sala_aee_acoes_existentes',
            'sala_aee_acoes_desenvolvidas',
            'sala_aee_responsaveis_acoes',
            'familia_acoes_existentes',
            'familia_acoes_desenvolvidas',
            'familia_responsaveis_acoes',
            'saude_acoes_existentes',
            'saude_acoes_desenvolvidas',
            'saude_responsaveis_acoes',
            'organizacao_tipo_aee',
            'descricao_outro',
            'atendimento_sala_recursos_multifuncionais',
            'tipo_sala',
            'espaco_alternativo',
            'frequencia_atendimentos',
            'frequencia_outro',
            'profissionais_educacao_necessarios',
            'profissionais_educacao_outro',
            'pdi_id'
    ];
}
