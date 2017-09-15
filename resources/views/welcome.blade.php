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
            overflow: hidden;
        }

        .full-height {
            height: 60vh;
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
            color: #ae0911;
            line-height: 28px;
            font-weight: 700;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #ae0911;
            color: white;
            font-weight: 700;
        }

        .form-control, input {
            background-color: #fdfffe;
            color: #ae0911;
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
    <div class="content" style="margin-top: 8%">
        <div class="title m-b-md">
            <label for="valorFinal" class="text-muted"></label>
            Total: <span class="valorFinal" id="valorFinal" style="color: red;">0,00</span>
        </div>
    </div>
    <div class="row col-sm-2">
        <div class="col-sm-6">
            <label for="juros" class="text-muted">Júros: </label>

            <p class="form-static valorJuros" id="juros" style="color: red;">0,00</p>
        </div>
        <div class="col-sm-6">
            <label for="multa" class="text-muted">Multa:</label>

            <p class="form-static valorMulta" id="multa" style="color: red;">0,00</p>
        </div>
    </div>
</div>
<div class="col-sm-12 flex-center text-center">
    <div class="col-sm-2">
        <div class="form-group">
            <label for="contextoAnoInicial">Ano de início</label>
            <select id="contextoAnoInicial" class="form-control"></select>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="contextoMesInicial">Mês de início</label>
            <select id="contextoMesInicial" class="form-control"></select>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <label for="contextoAnoFinal">Ano limite</label>
            <select id="contextoAnoFinal" class="form-control"></select>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="contextoMesFinal">Mês limite</label>
            <select id="contextoMesFinal" class="form-control"></select>
        </div>
    </div>
</div>
<div class="col-sm-12 flex-center text-center">
    <div class="col-sm-2">
        <div class="form-group">
            <label for="multa">Multa</label>
            <input name="multa" class="form-control" id="multa">
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <label for="juros">Juros</label>
            <input name="juros" class="form-control" id="juros">
        </div>
    </div>
</div>
<div class="col-sm-12 text-center">
    <button class="btn btn-info btnCalcular" style="text-align: center"><strong>Calcular</strong></button>
</div>
</body>
</html>
<script>
    $(document).ready(function () {
        var $anoInicial = $('#contextoAnoInicial'),
                $anoFinal = $('#contextoAnoFinal'),
                $mesInicial = $('#contextoMesInicial'),
                $mesFinal = $('#contextoMesInicial'),
                $juros = $('#juros'),
                $multa = $('#multa');

        $('#contextoAnoInicial,#contextoAnoFinal').select2({
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
        });

        $('#contextoMesInicial,#contextoMesFinal').select2({
            data: [
                {'id': 1, text: 'Janeiro'},
                {'id': 1, text: 'Fevereiro'},
                {'id': 1, text: 'Março'},
                {'id': 1, text: 'Abril'},
                {'id': 1, text: 'Maio'},
                {'id': 1, text: 'Junho'},
                {'id': 1, text: 'Julho'},
                {'id': 1, text: 'Agosto'},
                {'id': 1, text: 'Setembro'},
                {'id': 1, text: 'Outubro'},
                {'id': 1, text: 'Novembro'},
                {'id': 1, text: 'Dezembro'}
            ]
        });



        $valorContexto.on('change', function (e) {
            valor = $(this).select2('data')[0]['valor'];
        });

        function formatNumber(number, dec, dsep, tsep) {
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

        function formatarMoeda(valor) {
            if (!valor && valor !== 0) {
                return '-';
            }

            valor = parseFloat(valor) || 0;
            valor = formatNumber(valor, 2, ',', '.');
            return valor;
        };

        $('#tempoContexto, .unidade').on('change', function () {
            var dias = $('#tempoContexto').val(),
                    unidade = $('.unidade:checked').val();

            if (dias > 0) {
                var quantidade = dias * unidade;
                $('.valorFinal').html(formatarMoeda(valor * quantidade));
            }
        });
    });
</script>