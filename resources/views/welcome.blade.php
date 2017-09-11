<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Calculadora</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>

    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">


    <link href="{{ asset('select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('select2/js/select2.full.js') }}"></script>

    <!-- Styles -->
    <style>
        html, body {
            background-color: rgba(243, 242, 244, 0.78);
            color: #000000;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #000000;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: .5rem .75rem;
            font-size: 1rem;
            line-height: 1.25;
            color: #2b2e35;
            background-color: #fff;
            background-image: none;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, .15);
            border-radius: .25rem;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            font-weight: 600;
        }

        label {
            color: #000000;
            font-family: 'Raleway', sans-serif;
            font-weight: 800;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Painel de Controle</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Registrar</a>
                @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            <input type="hidden" id="multaContexto">
            <input type="hidden" id="jurosContexto">
        </div>

        <form class="form-inline">
            <label for="contexto">Contexto</label>
            <select class="form-control" id="contexto" name="contexto">
                <?php
                foreach (\App\Contexto::all() as $key => $contexto) {
                    echo "<option value='$contexto->id'><strong>$contexto->descricao</strong></option>";
                }
                ?>
            </select>
            <input id="valorContexto">
        </form>
    </div>
</div>
</body>
</html>
<script>
    $(document).ready(function () {
        var $valorContexto = $('#valorContexto');

        $('#contexto').on('change', function () {
            var id = $(this).val();
            var url = '{{ route('valoresPorContextoId') }}';

            $.ajax({
                url: url,
                dataType: 'json',
                data: {id: id},
                success: function (data) {
                    for (var row in data) {
                        data[row]['text'] = data[row]['valor'];
                    }

                    $valorContexto.select2({data: data});
                }
            });
        });

    });
</script>