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
        <th colspan="2" class="text-center">Ações</th>
    </thead>
    <tbody>
        @foreach($servers as $server)
        <tr>
            <td>{{ $server["id"] }}</td>
            <td>{{ $server["name"] }}</td>
            <td>{{ $server["max"] }}</td>
            <td><a href="{{ route('servers.edit', ['id' => $server['id']]) }}">Editar</a></td>
            <td><a href="{{ route('servers.destroy', ['id' => $server['id']]) }}">Remover</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection