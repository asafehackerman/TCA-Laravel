@extends('templates/main', [
    'titulo' => "Asafe's Pizzeria",
    'cabecalho' => 'Pizzas Disponíveis',
    'rota' => 'pizza.create',
    'relatorio' => 'report.pizza',
    'class' => App\Models\Pizza::class,
])

@section('conteudo')

<div class="container py-4">

    <div class="row g-4">
        @foreach ($pizzas as $pizza)
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="row g-0 align-items-center">

                    {{-- FOTO À ESQUERDA --}}
                    <div class="col-md-3 text-center p-3">
                        <img src="{{ str_starts_with($pizza->foto, 'assets/') ? asset($pizza->foto) : asset('storage/' . $pizza->foto) }}" class="img-fluid rounded" style="max-height: 150px; object-fit: cover;" alt="{{ $pizza->nome }}">
                    </div>

                    {{-- DADOS À DIREITA (VERTICAL) --}}
                    <div class="col-md-9">
                        <div class="card-body">

                            <h5 class="card-title mb-2">
                                {{ $pizza->nome }}
                            </h5>

                            <p class="card-text mb-1">
                                <strong>Descrição:</strong> {{ $pizza->descricao }}
                            </p>

                            <p class="card-text mb-1">
                                <strong>Categoria:</strong> {{ $pizza->categoria ?? '-' }}
                            </p>

                            <p class="card-text mb-3">
                                <strong>Preço:</strong> R$ {{ number_format($pizza->preco, 2, ',', '.') }}
                            </p>

                            {{-- BOTÕES --}}
                            <div class="d-flex gap-2">

                                @can('update', $pizza)
                                    <a href="{{ route('pizza.edit', $pizza->id) }}"
                                    class="btn btn-sm btn-outline-success">
                                        Alterar
                                    </a>
                                @endcan

                                @can('delete', $pizza)
                                    <form action="{{ route('pizza.destroy', $pizza->id) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Deseja realmente remover esta pizza?')">
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
