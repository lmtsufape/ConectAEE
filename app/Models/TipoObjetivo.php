<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoObjetivo extends Model
{
  public function objetivo()
  {
      return $this->belongsTo(Objetivo::class);
  }
}
