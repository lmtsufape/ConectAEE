<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pdi extends Model
{
    protected $fillable = [
        'aluno_id', 'user_id'

    ];

    public function alunos()
    {
        return $this->belongsTo(Aluno::class);
    }
}
