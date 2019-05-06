<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sugestao extends Model
{
    public function objetivo(){
        return $this->belongsTo('App\Objetivo');
    }
}
