@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Painel de controle</div>

                    <div class="panel-body">
                        <form action="{{ route('salvar-contexto') }}" method="POST" id="form-contexto">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="contextoDescricao">Descrição</label>
                                <input type="text" class="form-control" id="contextoDescricao" name="contextoDescricao" aria-describedby="emailHelp" placeholder="Insira uma descrição">
                                <small id="emailHelp" class="form-text text-muted">Algo que siva para identificar o contexto</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
