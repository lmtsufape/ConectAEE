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
    'cep',
    'municipio_id',
  ];

  public function alunos()
  {
     return $this->hasMany(Aluno::class);
  }

  public function escolas(): HasMany
  {
    return $this->hasMany(Escola::class);
  }

  public function municipio()
  {
    return $this->belongsTo(Municipio::class);
  }
}
