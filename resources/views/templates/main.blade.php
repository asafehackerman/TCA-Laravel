<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titulo }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('assets/img/logo_ifpr.png') }}" alt="Logo" height="40">
            Pizzaria IFPR
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pizza.index') }}">Pizzas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index') }}">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Others</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container py-4">
    @if(!empty($cabecalho))
        <h3 class="text-secondary"><b>{{ $cabecalho }}</b></h3>
        <hr>
    @endif

    @yield('conteudo')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
@yield('script')
</body>
</html>
