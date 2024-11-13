<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'especialidade_user', 'especialidade_id', 'user_id');
    }
}
