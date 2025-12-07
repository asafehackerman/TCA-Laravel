<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Relatório de Produtos - Sistema</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10pt;
            margin: 1cm 0.5cm;
            color: #000;
        }

        .texto-marca-dagua {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 7em;
            color: #888;
            opacity: 0.2;
            pointer-events: none;
        }

        .texto-restrito-cima,
        .texto-restrito-baixo {
            position: fixed;
            left: 50%;
            transform: translateX(-50%);
            border: 1px solid #999;
            color: #999;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            padding: 2px 10px;
        }

        .texto-restrito-cima { top: -25px; }
        .texto-restrito-baixo { bottom: -25px; }

        .identification-header {
            border: 1px solid black;
            text-align: center;
            font-weight: bold;
            padding: 5px;
            text-transform: uppercase;
            margin: 15px 0 5px;
        }

        .other-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black;
            margin-bottom: 15px;
        }

        .other-table td {
            border: 1px solid black;
            padding: 6px;
            vertical-align: middle;
        }

        .other-foto {
            width: 140px;
            text-align: center;
        }

        .other-foto img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 10px;
        }

        .label {
            font-weight: bold;
            width: 120px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>

<div class="texto-marca-dagua">SISTEMA</div>
<div class="texto-restrito-cima">DOCUMENTO GERADO PELO SISTEMA</div>

<hr>

<table width="100%">
    <tr>
        <td width="80">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/assets/img/logo.png'))) }}" width="75">
        </td>
        <td align="center">
            <h2>SISTEMA</h2>
            <h3>RELATÓRIO DE PRODUTOS</h3>
        </td>
        <td width="80" align="right">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/assets/img/logo.png'))) }}" width="75">
        </td>
    </tr>
</table>

<hr>

@foreach($others as $other)

<div class="identification-header">ITEM</div>

<table class="other-table">
    <tr>
        <!-- FOTO -->
        <td class="other-foto">
            @if($other->foto)

                @php
                    $caminho = str_starts_with($other->foto, 'assets/')
                        ? public_path($other->foto)
                        : storage_path('app/public/' . $other->foto);

                    $tipo = pathinfo($caminho, PATHINFO_EXTENSION);
                    $base64 = base64_encode(file_get_contents($caminho));
                @endphp <!-- facilitação pra escrever img src com o caminho correto -->

                <img src="data:image/{{ $tipo }};base64,{{ $base64 }}" style="max-height: 80px">

            @else
                <span>Sem Foto</span>
            @endif
        </td>

        {{-- DADOS --}}
        <td>
            <table width="100%">
                <tr>
                    <td class="label">Nome:</td>
                    <td>{{ $other->nome }}</td>
                </tr>

                <tr>
                    <td class="label">Descrição:</td>
                    <td>{{ $other->descricao ?? '---' }}</td>
                </tr>

                <tr>
                    <td class="label">Preço:</td>
                    <td>
                        @if(isset($other->preco))
                            R$ {{ number_format($other->preco, 2, ',', '.') }}
                        @else
                            ---
                        @endif
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

@endforeach

<div class="texto-restrito-baixo">DOCUMENTO GERADO PELO SISTEMA</div>

</body>
</html>
