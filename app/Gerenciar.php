<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gerenciar extends Model
{
    public function aluno(){
        return $this->hasOne(Aluno::class,'id','aluno_id');
    }

    public function gerenciador(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function cargo(){
        return $this->hasOne(Cargo::class,'id','cargo_id');
    }
}
