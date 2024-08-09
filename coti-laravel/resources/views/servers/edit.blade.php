@extends('layouts.main')

@section('title', 'Editar Servidor ' . $server["name"])

@section('content')
<h1>Edição de Servidores</h1>

<div class="row">
    <div class="col col-md-6">
        <form class="mb-4" action='{{ route("servers.update", ["id" => $server["id"]]) }}' method="POST">
            @csrf
            @method('PUT')
            <label for="name" class="mb-2 form-label">Nome</label>
            <input type="text" class="mb-2 form-control" id="name" name="name" value="{{ $server['name'] }}" />

            <label for="max" class="mb-2 form-label">Max</label>
            <input type="number" class="mb-2 form-control" id="max" name="max" value="{{ $server['max'] }}" />

            <button class="btn btn-primary" type="submit">Salvar</button>
        </form>
    </div>
</div>

<a class="btn btn-primary" href="{{ url()->previous() }}">Voltar</a>
@endsection