<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sugestao extends Model
{
  use softDeletes;

  public function objetivo(){
    return $this->belongsTo('App\Objetivo');
  }

  public function user(){
    return $this->belongsTo('App\User');
  }

  public function feedbacks(){
    return $this->hasMany('App\Feedback');
  }
}
