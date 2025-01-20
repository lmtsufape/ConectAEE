<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finalizacao extends Model
{
    protected $table = 'finalizacoes';

    protected $fillable = ['resumo_avaliacao_trimestral_aluno', 'pdi_id'];

    public function pdi(){
        return $this->belongsTo(Pdi::class);
    }
}
