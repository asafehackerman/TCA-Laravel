@extends('templates/main', [
    'titulo' => "Sistema Pizzaria",
    'cabecalho' => 'Editar Usuário',
    'rota' => '',
    'relatorio' => '',
])

@section('conteudo')

<form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
    </div>

    <!-- Role, caso queira exibir/editar -->
    <!--
    <div class="mb-3">
        <label for="role" class="form-label">Cargo / Tipo</label>
        <input type="text" class="form-control" id="role" name="role" value="{{ old('role', $user->role->name ?? '') }}">
    </div>
    -->

    <div class="mb-3">
        <label for="password" class="form-label">Senha <small>(deixe em branco para não alterar)</small></label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirmar Senha</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
    </div>

    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    <a href="{{ route('user.index') }}" class="btn btn-secondary">Voltar</a>
</form>

@endsection
