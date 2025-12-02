@extends('templates.main', [
    'titulo' => 'Sistema Pizzaria',
    'cabecalho' => 'Home - Dashboard'
])

@section('conteudo')
<div class="row">
    <div class="col">
        <h4>Bem-vindo ao sistema de pizzaria!</h4>
        <p>Use o menu para acessar Pizzas, Users ou Others.</p>
    </div>
</div>
@endsection
