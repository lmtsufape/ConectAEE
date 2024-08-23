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
        'data_de_nascimento', 
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
        'contato_responsavel'
    ];

    public function objetivos(){
        return $this->hasMany(Objetivo::class)->orderBy('updated_at','desc');
    }

    public function forum(){
        return $this->hasOne(ForumAluno::class);
    }

    public function pdi(){
        return $this->belongsTo(Pdi::class);
    }

    public function endereco(){
        return $this->hasOne(Endereco::class);
    }

    public function albuns(){
        return $this->hasMany(Album::class);
    }
}
