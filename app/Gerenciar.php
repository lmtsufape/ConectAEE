<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gerenciar extends Model
{
    public function aluno(){
        return $this->hasOne(Aluno::class,'id','aluno_id');
    }
}
