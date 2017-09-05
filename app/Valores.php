<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valores extends Model
{
    public function contexto()
    {
        return $this->belongsTo('App\Contexto');
    }
}
