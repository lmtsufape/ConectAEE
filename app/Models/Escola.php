<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo_mec',
        'nome',
        'telefone',
        'email',
        'endereco_id'
    ];

    public function municipio(){
        return $this->belongsToMany(Municipio::class, 'gre_municipio_escola', 'escola_id', 'municipio_id')
                    ->withTimestamps();
    }

    public function gre(){
        return $this->belongsToMany(Gre::class, 'gre_municipio_escola', 'escola_id', 'gre_id')
                    ->withTimestamps();
    }

    public function endereco(){
        return $this->belongsTo(Endereco::class);
    }

    public function users(){
        return $this->belongsToMany(User::class, 'escola_user', 'escola_id', 'user_id');
    }
}
