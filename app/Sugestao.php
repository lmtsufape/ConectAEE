<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Feedback;

class Sugestao extends Model
{
    public function objetivo(){
        return $this->belongsTo('App\Objetivo');
    }

    public function feedbacks(){
        return $this->hasMany(Feedback::class);
    }
}
