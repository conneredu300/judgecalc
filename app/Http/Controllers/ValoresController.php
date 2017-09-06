<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Valores;
use App\Contexto;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'valor' => 'required|unique:posts|max:255',
            'valorContexto' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('novo-valor')
                ->withErrors($validator)
                ->withInput();
        }

        $valores = new Valores();

        $valores->valor = $request->get('valor');

        $valores->contextoId = $request->get('valorContexto');

        $valores->save();

        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Entre com seu usuário e senha');

        return redirect()->route('valores');
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
     * @param  int                      $id
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
        //
    }
}
