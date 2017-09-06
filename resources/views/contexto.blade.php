@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Listagem de Contextos</div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Contextos</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contexto as $c)
                                <tr>
                                    <td>{{ $c->descricao }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <a href="{{ route('novo-contexto') }}" class="btn btn-info">Novo Registro</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
