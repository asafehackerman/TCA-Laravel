@extends('templates/main', [
    'titulo' => "Sistema Pizzaria",
    'cabecalho' => 'Editar Outro Produto',
    'rota' => '',
    'relatorio' => '',
])

@section('conteudo')

<form action="{{ route('other.update', $other->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Produto</label>
        <input type="text"
               class="form-control"
               id="nome"
               name="nome"
               value="{{ old('nome', $other->nome) }}"
               required>
    </div>

    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <input type="text"
               class="form-control"
               id="descricao"
               name="descricao"
               value="{{ old('descricao', $other->descricao) }}">
    </div>

    <div class="mb-3">
        <label for="preco" class="form-label">Preço</label>
        <input type="number"
               step="0.01"
               class="form-control"
               id="preco"
               name="preco"
               value="{{ old('preco', $other->preco) }}"
               required>
    </div>

    <div class="mb-3">
        <label for="foto" class="form-label">
            Foto do Produto <small>(opcional)</small>
        </label>

        <input type="file"
               class="form-control"
               id="foto"
               name="foto">

        @if ($other->foto)
            <div class="mt-2">
                <img
                    src="{{ str_starts_with($other->foto, 'assets/') 
                        ? asset($other->foto) 
                        : asset('storage/' . $other->foto) }}"
                    width="120"
                    class="rounded border"
                >
            </div>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    <a href="{{ route('other.index') }}" class="btn btn-secondary">Voltar</a>

</form>

@endsection
