@extends('layouts.app')

@section('title', 'Editar Filme')

@section('content')
    <h2>Editar Filme</h2>
    <form action="/movies/{{ $movie->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Título do Filme:</label>
            <input type="text" name="title" id="title" value="{{ $movie->title }}" required>
        </div>
        <div class="form-group">
            <label for="genre_id">Gênero:</label>
            <select name="genre_id" id="genre_id" required>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $movie->genre_id == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Atualizar">
        </div>
    </form>
@endsection
