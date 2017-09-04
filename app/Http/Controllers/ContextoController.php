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
        return view('contexto');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
