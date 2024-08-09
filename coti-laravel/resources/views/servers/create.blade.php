@extends('layouts.main')

@section('title', 'Criar Servidor')

@section('content')
<h1>Criação de Servidores</h1>

<div class="row">
  <div class="col col-md-6">
    <form class="mb-4" action="{{ route('servers.store') }}" method="POST">
      @csrf
      <label for="name" class="mb-2 form-label">Nome</label>
      <input type="text" class="mb-2 form-control" id="name" name="name" />

      <label for="max" class="mb-2 form-label">Max</label>
      <input type="number" class="mb-2 form-control" id="max" name="max" />

      <button class="btn btn-primary" type="submit">Salvar</button>
    </form>
  </div>
</div>

<a class="btn btn-primary" href="{{ url()->previous() }}">Voltar</a>
@endsection