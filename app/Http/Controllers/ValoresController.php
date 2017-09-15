<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Valores;
use App\Contexto;
use Illuminate\Contracts\Validation\Validator;
use Psy\Util\Json;

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
        $dados = $request->all();

        foreach ($dados['valor'] as $key => $valor) {
            if ($valor) {
                $valores = new Valores();

                $valores->valor = $valor;

                $valores->contexto_id = $request->get('valorContexto');

                $valores->mes = $dados['mes'][$key];

                $valores->save();
            }
        }

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

    public function valores(Request $request)
    {
        $id = $request->get('id');

        $valores = valores::all()->where('contexto_id', $id);

        return $valores->toJson();
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

    public function retornaArrayValoresPorData(Request $request){

    }

}
