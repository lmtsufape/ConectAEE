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
        return $this->belongsToMany(Gre::class, 'gre_municipio', 'municipio_id', 'gre_id');
    }

    public function escolas(){
        return $this->hasMany(Escola::class);
    }

    public function enderecos(){
        return $this->hasMany(Endereco::class);
    }
}
