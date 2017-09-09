<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valores extends Model
{
    public function contexto()
    {
        return $this->belongsTo('App\Contexto');
    }

    public $rules = [
        'valor' => 'required|numeric',
        'multa' => 'numeric',
        'juros' => 'numeric',
        'valorContexto' => 'required|numeric'
    ];

    public $messages = [
        'valorContexto.required' => 'Campo "Contexto" é obrigatório!',
        'valor.required' => 'Campo "Valor" é obrigatório!',
        'valor.numeric' => 'Campo "Valor" só aceita números',
        'multa.numeric' => 'Campo "Multa" só aceita números',
        'juros.numeric' => 'Campo "Juros" só aceita números'
    ];
}
