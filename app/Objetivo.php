<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
  public function atividades()
  {
      return $this->hasMany('App\Atividade');
  }
}
