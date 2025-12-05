@extends('templates/main', [
    'titulo' => "Sistema Pizzaria",
    'cabecalho' => 'Lista de Usuários',
    'rota' => 'user.create',
    'relatorio' => 'report.user',
    'class' => App\Models\User::class,
])


@section('conteudo')

<div class="container py-4">

    <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>TIPO</th>
                <th>AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->name ?? '-' }}</td>
                <td>

                    <a href="{{ route('user.edit', $user->id) }}"
                       class="btn btn-sm btn-outline-success">
                        Alterar
                    </a>

                    <form action="{{ route('user.destroy', $user->id) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('Deseja realmente remover este usuário?')">
                            Remover
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
