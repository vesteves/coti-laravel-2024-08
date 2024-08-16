@extends('layouts.main')

@section('title', 'Listar Jogos')

@section('content')

<h1>Listagem de Jogos</h1>

<a class="btn btn-primary" href='{{ route("games.create") }}'>Criar Jogo</a>

<table class="table">
    <thead>
        <th>ID</th>
        <th>Nome</th>
        <th>Max</th>
        <th colspan="2" class="text-center">Ações</th>
    </thead>
    <tbody>
        @foreach($games as $game)
        <tr>
            <td>{{ $game["id"] }}</td>
            <td>{{ $game["name"] }}</td>
            <td>{{ $game["max"] }}</td>
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
@endsection