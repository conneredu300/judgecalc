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
    public function destroy(Contexto $contexto)
    {
        $contexto->delete();

        return redirect()->route('home')->with('message','Registro apagado com sucesso');
    }
}
