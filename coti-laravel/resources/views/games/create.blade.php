@extends('layouts.main')

@section('title', 'Criar Jogos')

@section('content')
<h1>Criação de Jogos</h1>

@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<div class="row">
    <div class="col col-md-6">
        <form class="mb-4" action="{{ route('games.store') }}" method="POST">
            @csrf
            <label for="name" class="mb-2 form-label">Nome</label>
            <input type="text" class="mb-2 form-control" id="name" name="name" />

            <button class="btn btn-primary" type="submit">Salvar</button>
        </form>
    </div>
</div>

<a class="btn btn-primary" href="{{ url()->previous() }}">Voltar</a>
@endsection