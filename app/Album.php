<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
  public function fotos(){
      return $this->hasMany('App\Foto');
  }

  public function aluno(){
     return $this->belongsTo('App\Aluno');
  }
}
