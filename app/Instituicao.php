<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
  public function endereco(){
      return $this->hasOne(Endereco::class,'id','endereco_id');
  }

  public function alunos(){
      return $this->belongsToMany(Aluno::class);
  }
}
