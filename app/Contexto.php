<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contexto extends Model
{
    public function valores()
    {
        return $this->hasMany('App\Valores');
    }

    public function retornaArrayDescricao()
    {
        $contextos = Contexto::all();

        $arrDescricao = array();

        foreach($contextos as $contexto){
            $arrDescricao[] = $contexto->descricao;
        }

        return $arrDescricao;
    }
}