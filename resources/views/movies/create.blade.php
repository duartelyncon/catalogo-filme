@extends('layouts.app')

@section('title', 'Criar Filme')

@section('content')
    <h2>Criar Novo Filme</h2>
    <form action="/movies" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Título do Filme:</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div class="form-group">
            <label for="genre_id">Gênero:</label>
            <select name="genre_id" id="genre_id" required>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Salvar">
        </div>
    </form>
@endsection
