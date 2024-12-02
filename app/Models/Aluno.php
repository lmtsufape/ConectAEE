<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;

class Aluno extends Model
{
    use Notifiable;

    protected $fillable = [
            'nome', 
            'data_nascimento', 
            'cpf', 
            'matricula', 
            'idade_inicio_estudos', 
            'idade_escola_atual', 
            'nome_pai', 
            'escolaridade_pai', 
            'profissao_pai', 
            'nome_mae', 
            'escolaridade_mae', 
            'profissao_mae', 
            'num_irmaos', 
            'contato_responsavel',
            'mora_com',
            'escolaridade_atual_aluno',
            'historico_comum',
            'historico_especifico',
            'motivo_encaminhamento_aee',
            'avaliacao_geral_familiar',
            'avaliacao_geral_escolar',
            'anexos_laudos',
            'cid',
            'descricao_cid',
            'imagem',
            'municipio_id',
            'escola_id',
            'endereco_id',
            'professor_responsavel'
    ];

    public function objetivos(){
        return $this->hasMany(Objetivo::class)->orderBy('updated_at','desc');
    }

    public function pdis(){
        return $this->hasMany(Pdi::class);
    }

    public function endereco(){
        return $this->belongsTo(Endereco::class);
    }

    public function albuns(){
        return $this->hasMany(Album::class);
    }

    public function escola(){
        return $this->belongsTo(Escola::class);
    }

    public function municipio(){
        return $this->belongsTo(Municipio::class);
    } 
}
