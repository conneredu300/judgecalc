<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Valores;
use App\Contexto;
use Illuminate\Contracts\Validation\Validator;

class ValoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $valores = Valores::all();

        return view('valores', ['valores' => $valores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contexto = Contexto::all();

        return view('form-valores', ['contextos' => $contexto]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Valores $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valores = new Valores();

        $dados = $request->all();

        $validator = validator($dados, $valores->rules, $valores->messages);

        if ($validator->fails()) {
            return redirect()->route('novo-valor')->withErrors($validator)->withInput();
        }

        $valores->valor = $request->get('valor');

        $valores->contexto_id = $request->get('valorContexto');

        $valores->multa = $request->get('multa');

        $valores->juros = $request->get('juros');

        $valores->save();

        return redirect()->route('listar-valores');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $valor = (new Valores())->find($id);

        if ($valor->delete()) {
            return redirect()->route('listar-valores')->with([
                'message.level' => 'success',
                'message.content' => 'Apagado com sucesso!',
            ]);
        }

        return redirect()->route('listar-valores');
    }

}
