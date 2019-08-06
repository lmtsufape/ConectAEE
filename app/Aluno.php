<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use SoftDeletes;

    public function gerenciars(){
        return $this->hasMany(Gerenciar::class);
    }

    public function instituicoes(){
        return $this->belongsToMany(Instituicao::class, 'aluno_instituicaos');
    }

    public function objetivos(){
        return $this->hasMany(Objetivo::class)->orderBy('updated_at','desc');
    }

    public function forum(){
        return $this->hasOne(ForumAluno::class);
    }

    public function endereco(){
        return $this->hasOne(Endereco::class,'id','endereco_id');
    }

    public function albuns(){
        return $this->hasMany(Album::class);
    }
}
