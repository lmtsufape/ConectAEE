<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
  public function atividades()
  {
      return $this->hasMany('App\Atividade');
  }

  public function aluno()
  {
      return $this->belongsTo('App\Aluno');
  }

  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function tipoObjetivo()
  {
      return $this->hasOne('App\TipoObjetivo','id','tipo_objetivo_id');
  }

}
