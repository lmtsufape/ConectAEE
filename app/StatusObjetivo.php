<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusObjetivo extends Model
{
  public function objetivo()
  {
      return $this->belongsTo('App\Objetivo');
  }

  public function status()
  {
      return $this->hasOne('App\Status','id','status_id');
  }

}
