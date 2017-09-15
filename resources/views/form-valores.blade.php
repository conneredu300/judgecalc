@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Novo Valor</div>

                    <div class="panel-body">
                        {!! Form::open(['route' => 'salvar-valor', 'class' => 'form', 'enctype' => 'multipart/']) !!}

                        <div class="form-group{{ $errors->has('valorContexto') ? ' has-error' : '' }}">
                            <label for="valorContexto">Ano</label>
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

                        <div class="col-sm-12">
                            @foreach(range(1,12) as $mes)
                                <div class="col-sm-2">
                                    <div class="form-group{{ $errors->has('valor') ? ' has-error' : '' }}">
                                        <input type="hidden" name="mes[]" value="{{$mes}}">
                                        <input type="text" class="form-control" id="valor{{$mes}}" name="valor[]"
                                               value="{{ old('valor') }}">
                                        @if ($errors->has('valor'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('valor') }}</strong>
                                    </span>
                                        @else
                                            <small id="emailHelp" class="form-text text-muted">
                                                <?php
                                                setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                                                date_default_timezone_set('America/Sao_Paulo');
                                                $objData = Datetime::createFromFormat('!m', $mes);
                                                echo strftime('%B',strtotime($objData->format('y-m-d')));
                                                ?>
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
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
