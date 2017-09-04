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

                        <table>
                            <tr>
                                <th>Contextos</th>
                            </tr>
                            @foreach($contexto as $c)
                                <tr>
                                    <td>{{ $c->descricao }}</td>
                                </tr>
                            @endforeach
                        </table>

                            <a href="{{ url('/home') }}">Novo Contexto</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            alert("ola mundo");
        });
    </script>
@endsection
