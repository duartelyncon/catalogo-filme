@extends('layouts.app')

@section('title', 'Criar Gênero')

@section('content')
    <h2>Criar Novo Gênero</h2>
    <form action="/genres" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome do Gênero:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Salvar">
        </div>
    </form>
@endsection
