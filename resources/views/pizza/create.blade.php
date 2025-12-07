@extends('templates/main', [
    'titulo' => "Sistema Pizzaria",
    'cabecalho' => 'Criar Pizza',
    'rota' => '',
    'relatorio' => '',
])

@section('conteudo')

<form action="{{ route('pizza.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="nome" class="form-label">Nome da Pizza</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
    </div>

    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao">
    </div>

    <div class="mb-3">
        <label for="preco" class="form-label">Preço</label>
        <input type="number" step="0.01" class="form-control" id="preco" name="preco" required>
    </div>

    <div class="mb-3">
        <label for="categoria" class="form-label">Categoria</label>
        <select class="form-select" name="categoria" id="categoria" required>
            <option value="">Selecione</option>
            <option value="Salgada">Salgada</option>
            <option value="Doce">Doce</option>
        </select>
    </div>

    {{-- FOTO DA PIZZA --}}
    <div class="mb-3">
        <label for="foto" class="form-label">Foto da Pizza</label>
        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
    </div>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ route('pizza.index') }}" class="btn btn-secondary">Voltar</a>

</form>

@endsection
