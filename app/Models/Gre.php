<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gre extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
    ];
    
    public function municipios(){
        return $this->belongsToMany(Municipio::class, 'gre_municipio_escola', 'gre_id', 'municipio_id')
                    ->withPivot('escola_id')
                    ->withTimestamps();
    }

    public function escolas()
    {
        return $this->belongsToMany(Escola::class, 'gre_municipio_escola', 'gre_id', 'escola_id')
                    ->withPivot('municipio_id')
                    ->withTimestamps();
    }
}
