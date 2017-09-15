@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Listagem de valores</div>

                    <div class="panel-body">
                        @if(session()->has('message'))
                            <div class="alert alert-{{ session('message.level') }}">
                                {!! session('message.content') !!}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Valor Líquido</th>
                                <th>Mês</th>
                                <th>Contexto relacionado</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{ Form::hidden('_method', 'DELETE') }}
                            @foreach($valores as $valor)
                                <tr>
                                    <td>{{ $valor->valor }}</td>
                                    <td>{{ $valor->mes }}</td>
                                    <td>{{ $valor->contexto->descricao }}</td>
                                    <td><a href="{{ route('apagar-valor', $valor->id) }}" class="btn btn-danger">
                                            <strong>Excluir</strong>
                                        </a></td>
                                </tr>
                            @endforeach
                            {{ Form::close() }}
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
