@extends('layouts.app')

@section('title', 'Editar Gênero')

@section('content')
    <h2>Editar Gênero</h2>
    <form action="/genres/{{ $genre->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome do Gênero:</label>
            <input type="text" name="name" id="name" value="{{ $genre->name }}" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Atualizar">
        </div>
    </form>
@endsection
