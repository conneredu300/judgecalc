@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Novo Contexto</div>

                    <div class="panel-body">
                        {!! Form::open(['route' => 'salvar-contexto', 'class' => 'form']) !!}

                        <div class="form-group{{ $errors->has('contextoDescricao')? ' has-error' : '' }}">
                            {!! Form::label('contextoDescricao', 'Ano') !!}
                            <input type="text" class="form-control" id="contextoDescricao" name="contextoDescricao">

                            @if($errors->has('contextoDescricao'))
                                <span class="help-block">
                                <strong>{{ $errors->first('contextoDescricao') }}</strong>
                                    </span>
                            @else
                                <small id="emailHelp" class="form-text text-muted">Ano referência</small>
                            @endif
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
