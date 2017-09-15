<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valores extends Model
{
    public function contexto()
    {
        return $this->belongsTo('App\Contexto');
    }

    public function retornaRegras()
    {
        $array['valorContexto'] = 'required|numeric';

        foreach(range(1,12) as $mes){
            $key = "valor$mes";
            $array[$key] = 'required|numeric';
        }

        return $array;
    }

    public function retornaMessagens()
    {
        $array['valorContexto'] = 'Campo obrigatório';

        foreach(range(1,12) as $mes){
            $key = "valor$mes";
            $array[$key] = 'Campo obrigatório';
        }

        return $array;
    }
}
