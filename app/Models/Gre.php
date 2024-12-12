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
        return $this->belongsToMany(Municipio::class, 'gre_municipio', 'gre_id', 'municipio_id');
    }
}
