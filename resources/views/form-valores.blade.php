@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Novo Valor</div>

                    <div class="panel-body">
                        {!! Form::open(['route' => 'salvar-valor', 'class' => 'form']) !!}

                        <div class="form-group{{ $errors->has('valorContexto') ? ' has-error' : '' }}">
                            <label for="valorContexto">Contextos</label>
                            <select class="form-control" id="valorContexto" name="valorContexto">
                                <?php
                                foreach ($contextos as $key => $contexto) {
                                    echo "<option value='$contexto->id'>$contexto->descricao</option>";
                                }
                                ?>
                            </select>
                            @if ($errors->has('valorContexto'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('valorContexto') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('valor') ? ' has-error' : '' }}">
                            {!! Form::label('valor', 'Valor') !!}
                            <input type="text" class="form-control" id="valor" name="valor" value="{{ old('valor') }}">
                            @if ($errors->has('valor'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('valor') }}</strong>
                                    </span>
                            @else
                                <small id="emailHelp" class="form-text text-muted">Valor relativo ao contexto</small>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('multa') ? ' has-error' : '' }}">
                            {!! Form::label('multa', 'Multa') !!}
                            <input type="text" class="form-control" id="multa" name="multa" value="{{ old('multa') }}">

                            @if ($errors->has('multa'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('multa') }}</strong>
                                    </span>
                            @else
                                <small id="emailHelp" class="form-text text-muted">Valor relativo a multa</small>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('juros') ? ' has-error' : '' }}">
                            {!! Form::label('juros', 'Juros') !!}
                            <input type="text" class="form-control" id="juros" name="juros" value="{{ old('juros') }}">

                            @if ($errors->has('juros'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('juros') }}</strong>
                                    </span>
                            @else
                                <small id="emailHelp" class="form-text text-muted">Valor relativo a juros</small>
                            @endif
                        </div>

                        <button class="btn btn-success" type="submit">Salvar</button>

                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
