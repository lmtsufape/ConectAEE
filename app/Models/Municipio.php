<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'gre_id'
    ];

    public function gre(){
        return $this->belongsTo(Gre::class);
    }

    public function escolas(){
        return $this->hasMany(Escola::class);
    }
}
