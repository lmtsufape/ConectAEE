<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Atividade extends Model
{
  use SoftDeletes;

  public function objetivo(){
    return $this->belongsTo('App\Objetivo');
  }
}
