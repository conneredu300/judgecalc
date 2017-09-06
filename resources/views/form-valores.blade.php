@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Novo Valor</div>

                    <div class="panel-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {!! Form::open(['route' => 'salvar-valor', 'class' => 'form']) !!}

                        <div class="form-group">
                            <label for="valorContexto">Example select</label>
                            <select class="form-control" id="valorContexto" name="valorContexto">
                                <?php
                                    foreach($contextos as $key => $contexto){
                                        echo "<option value='$contexto->id'>$contexto->descricao</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            {!! Form::label('valor', 'Valor') !!}
                            <input type="text" class="form-control" id="valor" name="valor">
                            <small id="emailHelp" class="form-text text-muted">Valor relativo ao contexto</small>
                        </div>

                        <div class="form-group">
                            {!! Form::label('multa', 'Multa') !!}
                            <input type="text" class="form-control" id="multa" name="multa">
                            <small id="emailHelp" class="form-text text-muted">Valor relativo a multa</small>
                        </div>

                        <div class="form-group">
                            {!! Form::label('juros', 'Juros') !!}
                            <input type="text" class="form-control" id="juros" name="juros">
                            <small id="emailHelp" class="form-text text-muted">Valor relativo a juros</small>
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
