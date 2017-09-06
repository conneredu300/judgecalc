@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Listagem de valores</div>

                    <div class="panel-body">
                        @if(session()->has('message.level'))
                            <div class="alert alert-{{ session('message.level') }}">
                                {!! session('message.content') !!}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Valor Líquido</th>
                                <th>Multas</th>
                                <th>Júros</th>
                                <th>Contexto relacionado</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($valores as $valor)
                                <tr>
                                    <td>{{ $valor->contexto->descricao }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <a href="{{ route('novo-valor') }}" class="btn btn-info">Novo Registro</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
