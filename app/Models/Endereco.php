<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Endereco extends Model
{

  protected $fillable = [
    'logradouro',
    'numero',
    'bairro',
    'cidade',
    'cep',
  ];

  public function alunos()
  {
     return $this->hasMany(Aluno::class);
  }

  public function users(): HasMany
  {
    return $this->hasMany(User::class);
  }

  public function escolas(): HasMany
  {
    return $this->hasMany(Escola::class);
  }
}
