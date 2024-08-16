@extends('layouts.main')

@section('title', 'Editar Jogo ' . $game["name"])

@section('content')
<h1>Edição de Jogos</h1>

<div class="row">
    <div class="col col-md-6">
        <form class="mb-4" action='{{ route("games.update", ["game" => $game["id"]]) }}' method="POST">
            @csrf
            @method('PUT')
            <label for="name" class="mb-2 form-label">Nome</label>
            <input type="text" class="mb-2 form-control" id="name" name="name" value="{{ $game['name'] }}" />

            <button class="btn btn-primary" type="submit">Salvar</button>
        </form>
    </div>
</div>

<a class="btn btn-primary" href="{{ url()->previous() }}">Voltar</a>
@endsection