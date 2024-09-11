<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{

  protected $fillable = [
    'logradouro',
    'numero',
    'bairro',
    'cidade',
    'cep',
  ];

  public function aluno()
  {
     return $this->hasMany(Aluno::class);
  }
}
