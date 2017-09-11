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
            height: 80vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .flex-right {
            align-items: right;
            display: flex;
            justify-content: right;
            left: 930px;
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

        label, select {
            color: #000000 !important;
            font-family: 'Raleway', sans-serif;
            font-weight: 800;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #ff7127;
            line-height: 28px;
            font-weight: 700;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #fb640c;
            color: white;
            font-weight: 700;
        }

        .form-control, input {
            background-color: #fdfffe;
            color: #ff7127;
            font-weight: 700;
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
        <input type="hidden" id="multaContexto">
        <input type="hidden" id="jurosContexto">

        <div class="title m-b-md">
            Resultado: <p class="form-static valorFinal">0,00</p>
        </div>
    </div>
</div>
<div class="row col-sm-12">
    <div class="col-sm-4">
        <div class="form-group">
            <label for="contexto">Contexto</label>
            <select id="contexto" class="form-control"></select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="valorContexto">Valor</label>
            <select id="valorContexto" class="form-control"></select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="tempoContexto">Tempo</label>
            <input id="tempoContexto" class="form-control">
        </div>
    </div>
</div>
<div class="row col-sm-12 flex-right">
    <div class="radio">
        <label><input class="unidade" type="radio" name="unidadeTempo" checked value=1>Dias&nbsp;</label>
    </div>
    <div class="radio">
        <label><input class="unidade" type="radio" name="unidadeTempo" value=30>Mêses&nbsp;</label>
    </div>
    <div class="radio">
        <label><input class="unidade" type="radio" name="unidadeTempo" value=365>Anos&nbsp;</label>
    </div>
</div>
</body>
</html>
<script>
    $(document).ready(function () {
        var $contexto      = $('#contexto'),
            $valorContexto = $('#valorContexto'),
            multa          = 0,
            valor          = 0,
            juros          = 0;

        $contexto.select2({
            ajax: {
                url: '{{ route("listagemContextos") }}',
                dataType: 'json',
                processResults: function (data) {
                    var results = [];
                    $.each(data, function (index, el) {
                        results.push({
                            id: el.id,
                            text: el.descricao
                        });
                    });

                    return {
                        results: results
                    };
                }
            }
        }).on('change', function () {
            $valorContexto.select2({
                ajax: {
                    url: '{{ route("valoresPorContextoId") }}',
                    data: {id: $(this).val()},
                    dataType: 'json',
                    processResults: function (data) {
                        var results = [];
                        $.each(data, function (index, el) {
                            results.push({
                                id: el.id,
                                text: el.valor,
                                multa: el.multa,
                                juros: el.juros,
                                valor: el.valor
                            });
                        });

                        return {
                            results: results
                        };
                    }
                }
            });
        });

        $valorContexto.on('change', function (e) {
            juros = $(this).select2('data')[0]['juros'];
            multa = $(this).select2('data')[0]['multa'];
            valor = $(this).select2('data')[0]['valor'];
        });

        this.formatNumber = function (number, dec, dsep, tsep) {
            if (isNaN(number) || number == null) {
                return '';
            }

            dec = dec || 2;
            dsep = dsep || '.';
            tsep = tsep || '';

            var newNumber = parseFloat(number).toFixed(~~dec);

            var parts = newNumber.split('.');
            var fnums = parts[0];
            var decimals = parts[1] ? (dsep || '.') + parts[1] : '';

            return fnums.replace(/(\d)(?=(?:\d{3})+$)/g, '$1' + tsep) + decimals;
        };

        this.formatarMoeda = function (valor) {
            if (!valor && valor !== 0) {
                return '-';
            }

            valor = parseFloat(valor) || 0;
            valor = __versaShared.formatNumber(valor, 2, ',', '.');
            return valor;
        };

        $('#tempoContexto, .unidade').on('change', function () {
            var dias    = $('#tempoContexto').val(),
                unidade = $('.unidade').val();

            if(dias > 0 && unidade > 0){
                var quantidade = dias * unidade;
                if(juros > 0)
            }
        });
    });
</script>