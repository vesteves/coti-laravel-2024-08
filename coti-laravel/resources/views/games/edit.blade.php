@extends('layouts.main')

@section('title', 'Editar Jogo ' . $game["name"])

@section('content')
<h1 class="text-center">Edição de Jogos</h1>

<div class="row">
    <div class="col offset-md-3 col-md-6">
        <form class="mb-4" action='{{ route("games.update", ["game" => $game["id"]]) }}' method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if($game->avatar)
            <div class="mb-2 text-center">
                <img src="{{ Storage::url($game->avatar) }}" class="img-thumbnail" alt="">
            </div>
            @endif

            <label for="name" class="mb-2 form-label">Nome</label>
            <input type="text" class="mb-2 form-control" id="name" name="name" value="{{ $game['name'] }}" />

            <label for="avatar" class="mb-2 form-label">Avatar</label>
            <input type="file" class="mb-2 form-control" id="avatar" name="avatar" />

            <button class="btn btn-primary" type="submit">Salvar</button>
        </form>
    </div>
</div>

<a class="btn btn-primary" href="{{ url()->previous() }}">Voltar</a>
@endsection