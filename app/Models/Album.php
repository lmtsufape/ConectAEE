<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
  public function fotos(){
      return $this->hasMany(Foto::class);
  }

  public function aluno(){
     return $this->belongsTo(Aluno::class);
  }

  public function user(){
     return $this->belongsTo(User::class);
  }
}
