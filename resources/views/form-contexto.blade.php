@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Novo Contexto</div>

                    <div class="panel-body">
                        {!! Form::open(['route' => 'salvar-contexto', 'class' => 'form']) !!}

                        <div class="form-group">
                            {!! Form::label('contextoDescricao', 'Descrição') !!}
                            <input type="text" class="form-control" id="contextoDescricao" name="contextoDescricao">
                            <small id="emailHelp" class="form-text text-muted">Tipo de contexto</small>
                        </div>

                        <button class="btn btn-success" type="submit">enviar</button>

                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
