<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pdi extends Model
{
    protected $fillable = [
        'resumo_avaliacao_trimestral_aluno', 'aluno_id', 'user_id'

    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function condicaoSaude(){
        return $this->hasOne(CondicaoSaude::class);
    }
    public function desenvolvimento(){
        return $this->hasOne(Desenvolvimento::class);
    }
    public function especificidade(){
        return $this->hasOne(EspecificidadeEducacional::class);
    }
    public function recursosMultifuncionais(){
        return $this->hasOne(RecursosMultifuncionais::class);
    }
}
