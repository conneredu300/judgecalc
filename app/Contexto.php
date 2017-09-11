<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contexto extends Model
{
    public function valores()
    {
        return $this->hasOne('App\Valores');
    }

    public $rules = [
        'contextoDescricao' => 'required'
    ];

    public $messages = [
        'contextoDescricao.required' => 'Campo "Descrição" é obrigatório'
    ];
}