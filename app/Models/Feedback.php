<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sugestao;
use App\Models\User;

class Feedback extends Model
{
    public function sugestao(){
        return $this->belongsTo(Sugestao::class,'sugestao_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
