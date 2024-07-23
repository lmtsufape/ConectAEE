<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForumObjetivo extends Model
{
    public function objetivo(){
        return $this->belongsTo(Objetivo::class);
    }
}
