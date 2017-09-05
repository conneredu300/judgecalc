@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Painel de controle</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST">
                            {{ csrf_field() }}
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
                                        <td><a href="{{ url('apagar') . '/' . $c->id }}"
                                               class="btn btn-danger">Apagar</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </form>
                        <a href="{{ route('novo-contexto') }}">Novo Contexto</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {

        });
    </script>
@endsection
