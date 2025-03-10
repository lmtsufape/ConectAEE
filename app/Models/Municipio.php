<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
    ];

    public function gres(){
        return $this->belongsToMany(Gre::class, 'gre_municipio_escola', 'municipio_id', 'gre_id')
                    ->withPivot('gre_id')
                    ->withTimestamps();
    }

    public function escolas()
    {
        return $this->belongsToMany(Escola::class, 'gre_municipio_escola', 'municipio_id', 'escola_id')
                    ->withPivot('municipio_id')
                    ->withTimestamps();
    }

    public function enderecos(){
        return $this->hasMany(Endereco::class);
    }
}
