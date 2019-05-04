<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
  public function objetivo()
 {
     return $this->belongsTo('App\Objetivo');
 }
}
