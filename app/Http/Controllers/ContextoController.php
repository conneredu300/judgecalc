<?php

namespace App\Http\Controllers;

use App\Contexto;
use Illuminate\Http\Request;

class ContextoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contexto = Contexto::all();

        return view('contexto',['contexto' => $contexto]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form-contexto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contexto = new Contexto;

        $dados = $request->all();

        $validator = validator($dados, $contexto->rules, $contexto->messages);

        if($validator->fails()){
            return redirect()->route('novo-contexto')->withErrors($validator);
        }

        $contexto->descricao = $request->contextoDescricao;

        $contexto->save();

        return redirect()->route('home')->with('message','Contexto salvo com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contexto  $contexto
     * @return \Illuminate\Http\Response
     */
    public function show(Contexto $contexto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contexto  $contexto
     * @return \Illuminate\Http\Response
     */
    public function edit(Contexto $contexto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contexto  $contexto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contexto $contexto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contexto  $contexto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contexto = (new Contexto())->find($id);

        if ($contexto->delete()) {
            return redirect()->route('listar-contextos')->with([
                'message.level' => 'success',
                'message.content' => "'$contexto->descricao' apagado com sucesso!",
            ]);
        }

        return redirect()->route('listar-valores');
    }

    public function contextos()
    {
        $valores = contexto::all();

        return $valores->toJson();
    }
}
