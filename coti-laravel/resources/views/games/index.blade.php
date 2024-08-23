@extends('layouts.main')

@section('title', 'Listar Jogos')

@section('content')

<h1>Listagem de Jogos</h1>

<a class="btn btn-primary" href='{{ route("games.create") }}'>Criar Jogo</a>

<table class="table">
    <thead>
        <th>ID</th>
        <th>Nome</th>
        <th colspan="2" class="text-center">Ações</th>
    </thead>
    <tbody>
        @foreach($games as $game)
        <tr>
            <td>{{ $game["id"] }}</td>
            <td>{{ $game["name"] }}</td>
            <td class="text-center">
                <a href="{{ route('games.edit', ['game' => $game['id']]) }}" class="btn btn-primary">
                    <span class="material-symbols-outlined">edit</span>
                </a>
            </td>
            <td class="text-center">
                <form action="{{ route('games.destroy', ['game' => $game['id']]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <span class="material-symbols-outlined">delete</span>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        @for ($page = 1; $page <= $games->lastPage(); $page++)
            <li class="page-item"><a class="page-link" href='{{ route("games.index", ["page" => $page]) }}'>{{ $page }}</a></li>
            @endfor
    </ul>
</nav>
<a class="btn btn-primary" href='{{ route("games.export") }}'>Exportar lista</a>
@endsection