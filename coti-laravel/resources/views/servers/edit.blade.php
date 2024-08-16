@extends('layouts.main')

@section('title', 'Editar Servidor ' . $server["name"])

@section('content')
<h1>Edição de Servidores</h1>

<div class="row">
    <div class="col col-md-6">
        <form class="mb-4" action='{{ route("servers.update", ["server" => $server["id"]]) }}' method="POST">
            @csrf
            @method('PUT')
            <label for="name" class="mb-2 form-label">Nome</label>
            <input type="text" class="mb-2 form-control" id="name" name="name" value="{{ $server['name'] }}" />

            <label for="max" class="mb-2 form-label">Max</label>
            <input type="number" class="mb-2 form-control" id="max" name="max" value="{{ $server['max'] }}" />

            <label for="game_id" class="mb-2 form-label">Jogo</label>
            <select name="game_id" class="mb-2 form-select">
                @foreach($games as $game)
                <option
                    value="{{ $game->id }}"
                    @selected($game->id === $server->game_id)
                    >{{ $game->name }}</option>
                @endforeach
            </select>

            <button class="btn btn-primary" type="submit">Salvar</button>
        </form>
    </div>
</div>

<a class="btn btn-primary" href="{{ url()->previous() }}">Voltar</a>
@endsection