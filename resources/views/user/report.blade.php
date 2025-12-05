<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Relatório de Usuários - Sistema Pizzaria</title>
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
            opacity: 0.3;
            pointer-events: none;
            white-space: nowrap;
            z-index: 0;
        }
        .texto-restrito-cima {
            position: fixed;
            top: -25px;
            left: 50%;
            transform: translateX(-50%);
            border: 1px solid #999;
            color: #999;
            font-size: 18px;
            font-weight: bolder;
            text-align: center;
            padding: 2px 10px;
            z-index: 999;
        }
        .texto-restrito-baixo {
            position: fixed;
            bottom: -25px;
            left: 50%;
            transform: translateX(-50%);
            border: 1px solid #999;
            color: #999;
            font-size: 20px;
            font-weight: bolder;
            text-align: center;
            padding: 2px 10px;
            z-index: 999;
        }
        .header {
            text-align: center;
            line-height: 1.2;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        .header .main-title { font-size: 11pt; }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black;
            margin-top: 0.5rem;
            margin-bottom: 1rem;
        }
        .info-table td {
            border: 1px solid black;
            padding: 3px 6px;
            vertical-align: top;
        }
        .info-table .label {
            font-weight: bold;
            width: 150px;
            text-transform: uppercase;
        }
        .identification-header {
            border: 1px solid black;
            text-align: center;
            font-weight: bold;
            padding: 5px;
            margin-bottom: -9px;
            text-transform: uppercase;
            margin-top: 10px;
        }
        .info-table .photo-cell {
            width: 130px;
            font-weight: bold;
            text-align: center;
            vertical-align: middle;
            text-transform: uppercase;
        }
        .info-table .inner-table {
            width: 100%;
        }
        .info-table .inner-table td {
            border: none;
            padding: 1px 4px;
        }

    </style>
</head>
<body>
    <div class="texto-marca-dagua"> PIZZARIA </div>
    <div class="texto-restrito-cima"> DOCUMENTO GERADO PELO SISTEMA </div>
    <hr>
    <table style="margin: 0px auto; width: 100%">
        <tbody>
            <tr>
                <td style="width: 75px; text-align: left;">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/assets/img/logo.png'))) }}" width="78" height="78" style="border-radius: 25%;">
                </td>
                <td style="width: 1fr; text-align: center;">
                    <span style="font-size: 18px; font-weight: bold;">PIZZARIA</span>
                    <div style="font-size: 18px;">RELATÓRIO DE USUÁRIOS</div>
                </td>
                <td style="width: 75px; text-align: right;">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/assets/img/logo.png'))) }}" width="90" height="90" style="border-radius: 25%;">
                </td>
            </tr>
        </tbody>
    </table>
    <hr>

    <div class="texto-restrito-baixo" style="position: absolute; bottom: 1px;"> DOCUMENTO GERADO PELO SISTEMA </div>

    <div class="identification-header">IDENTIFICAÇÃO</div>

    @foreach($users as $user)
        <table class="info-table identification-section">
            <tbody>
                <tr>
                    <td>
                        <table class="inner-table">
                            <tr><td class="label table-label">NOME:</td><td>{{ $user->name }}</td></tr>
                            <tr><td class="label">EMAIL:</td><td>{{ $user->email }}</td></tr>
                            <tr><td class="label">FUNÇÃO:</td><td>{{ $user->role }}</td></tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    @endforeach

</body>
</html>
