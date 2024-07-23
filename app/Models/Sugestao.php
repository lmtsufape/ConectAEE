<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Sugestao extends Model
{
  use softDeletes;

  public function getDataAttribute( $value ) {
    return (new Carbon($value))->format('d/m/Y');
  }

  public function objetivo(){
    return $this->belongsTo(Objetivo::class);
  }

  public function user(){
    return $this->belongsTo(User::class);
  }

  public function feedbacks(){
    return $this->hasMany(Feedback::class)->orderBy('created_at','asc');
  }
}
