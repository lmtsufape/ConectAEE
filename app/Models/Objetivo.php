<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Objetivo extends Model
{
  use SoftDeletes;

  public function getDataAttribute( $value ) {
    return (new Carbon($value))->format('d/m/Y');
  }

  public function atividades()
  {
      return $this->hasMany(Atividade::class);
  }

  public function sugestoes()
  {
      return $this->hasMany(Sugestao::class);
  }

  public function aluno()
  {
      return $this->belongsTo(Aluno::class);
  }

  public function user()
  {
      return $this->belongsTo(User::class);
  }

  public function forum()
  {
    return $this->hasOne(ForumObjetivo::class);
  }

  public function cor()
  {
    return $this->hasOne(Cor::class, 'id', 'cor_id');
  }

  public function tipoObjetivo()
  {
      return $this->hasOne(TipoObjetivo::class,'id','tipo_objetivo_id');
  }

  public function statusObjetivo()
  {
      return $this->hasMany(StatusObjetivo::class);
  }

}
