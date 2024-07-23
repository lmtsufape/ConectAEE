<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
  public function statusObjetivo()
  {
      return $this->belongTo(StatusObjetivo::class);
  }
}
