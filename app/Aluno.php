<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    public function gerenciars(){
        return $this->hasMany(Gerenciar::class);
    }

    public function objetivos(){
        return $this->hasMany(Objetivo::class);
    }
}
