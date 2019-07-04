<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    public function gerenciars(){
        return $this->hasMany(Gerenciar::class);
    }

    public function instituicoes(){
        return $this->belongsToMany(Instituicao::class, 'aluno_instituicaos');
    }

    public function objetivos(){
        return $this->hasMany(Objetivo::class);
    }

    public function forum(){
        return $this->hasOne(ForumAluno::class);
    }

    public function endereco(){
        return $this->hasOne(Endereco::class,'id','endereco_id');
    }
}
