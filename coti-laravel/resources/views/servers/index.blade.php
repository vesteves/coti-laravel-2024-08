@extends('layouts.main')

@section('title', 'Listar Servidores')

@section('content')

<h1>Listagem de Servidores</h1>

<a class="btn btn-primary" href='{{ route("servers.create") }}'>Criar Servidor</a>

<table class="table">
    <thead>
        <th>ID</th>
        <th>Nome</th>
        <th>Max</th>
        <th>Jogo</th>
        <th colspan="2" class="text-center">Ações</th>
    </thead>
    <tbody>
        @foreach($servers as $server)
        <tr>
            <td>{{ $server["id"] }}</td>
            <td>{{ $server["name"] }}</td>
            <td>{{ $server["max"] }}</td>
            <td>{{ $server->game->name }}</td>
            <td class="text-center">
                <a href="{{ route('servers.edit', ['server' => $server['id']]) }}" class="btn btn-primary">
                    <span class="material-symbols-outlined">edit</span>
                </a>
            </td>
            <td class="text-center">
                <form action="{{ route('servers.destroy', ['server' => $server['id']]) }}" method="POST">
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