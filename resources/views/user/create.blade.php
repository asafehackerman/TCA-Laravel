@extends('templates/main', [
    'titulo' => "Sistema Pizzaria",
    'cabecalho' => 'Criar Usuário',
    'rota' => '',
    'relatorio' => '',
])

@section('conteudo')

<form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    
    <!-- role
    <div class="mb-3">
        <label for="role" class="form-label">Cargo / Tipo</label>
        <input type="text" class="form-control" id="role" name="role">
    </div>
    -->
    <div class="mb-3">
        <label for="password" class="form-label">Senha</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirmar Senha</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
    </div>

    <button type="submit" class="btn btn-primary">Criar Usuário</button>
    <a href="{{ route('user.index') }}" class="btn btn-secondary">Voltar</a>
</form>

@endsection
