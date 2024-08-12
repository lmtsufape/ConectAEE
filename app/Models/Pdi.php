<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pdi extends Model
{
    protected $fillable = [
        '',

    ];

    public function alunos()
    {
        return $this->belongsTo(Aluno::class);
    }
}
