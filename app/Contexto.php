<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contexto extends Model
{
    public function valores()
    {
        return $this->hasMany('App\Valores');
    }
}