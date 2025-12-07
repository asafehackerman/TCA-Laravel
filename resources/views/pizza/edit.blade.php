@extends('templates/main', [
    'titulo' => "Sistema Pizzaria",
    'cabecalho' => 'Editar Pizza',
    'rota' => '',
    'relatorio' => '',
])

@section('conteudo')

<form action="{{ route('pizza.update', $pizza->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nome" class="form-label">Nome da Pizza</label>
        <input type="text"
               class="form-control"
               id="nome"
               name="nome"
               value="{{ old('nome', $pizza->nome) }}"
               required>
    </div>

    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <input type="text"
               class="form-control"
               id="descricao"
               name="descricao"
               value="{{ old('descricao', $pizza->descricao) }}">
    </div>

    <div class="mb-3">
        <label for="preco" class="form-label">Preço</label>
        <input type="number"
               step="0.01"
               class="form-control"
               id="preco"
               name="preco"
               value="{{ old('preco', $pizza->preco) }}"
               required>
    </div>

    <div class="mb-3">
        <label for="categoria" class="form-label">Categoria</label>
        <input type="text"
               class="form-control"
               id="categoria"
               name="categoria"
               value="{{ old('categoria', $pizza->categoria) }}"
               required>
    </div>

    <div class="mb-3">
        <label for="foto" class="form-label">
            Foto da Pizza <small>(opcional)</small>
        </label>

        <input type="file"
               class="form-control"
               id="foto"
               name="foto">

        @if ($pizza->foto)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $pizza->foto) }}"
                     width="120"
                     class="rounded border">
            </div>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    <a href="{{ route('pizza.index') }}" class="btn btn-secondary">Voltar</a>

</form>

@endsection
