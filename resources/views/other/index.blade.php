@extends('templates/main', [
    'titulo' => "Asafe's Pizzeria",
    'cabecalho' => 'Outros Produtos',
    'rota' => 'other.create',
    'relatorio' => 'report.other',
    'class' => App\Models\Other::class,
])

@section('conteudo')

<div class="container py-4">

    <div class="row g-4">
        @foreach ($others as $other)
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="row g-0 align-items-center">

                    {{-- FOTO À ESQUERDA --}}
                    <div class="col-md-3 text-center p-3">
                        <img src="{{ str_starts_with($other->foto, 'assets/') ? asset($other->foto) : asset('storage/' . $other->foto) }}" class="img-fluid rounded" style="max-height: 150px; object-fit: cover;" alt="{{ $other->nome }}">
                    </div>

                    {{-- DADOS À DIREITA (VERTICAL) --}}
                    <div class="col-md-9">
                        <div class="card-body">

                            <h5 class="card-title mb-2">
                                {{ $other->nome }}
                            </h5>

                            <p class="card-text mb-1">
                                <strong>Descrição:</strong> {{ $other->descricao }}
                            </p>

                            <p class="card-text mb-3">
                                <strong>Preço:</strong> R$ {{ number_format($other->preco, 2, ',', '.') }}
                            </p>

                            {{-- BOTÕES --}}
                            <div class="d-flex gap-2">

                                @can('update', $other)
                                    <a href="{{ route('other.edit', $other->id) }}"
                                    class="btn btn-sm btn-outline-success">
                                        Alterar
                                    </a>
                                @endcan

                                @can('delete', $other)
                                    <form action="{{ route('other.destroy', $other->id) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Deseja realmente remover este produto?')">
                                            Remover
                                        </button>
                                    </form>
                                @endcan

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection
