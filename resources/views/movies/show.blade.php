@extends('layouts.app')

@section('title', 'Detalhes do Filme')

@section('content')
    <h2>{{ $movie->title }}</h2>
    <p><strong>Gênero:</strong> {{ $movie->genre->name }}</p>
    <p><strong>Descrição:</strong> {{ $movie->description }}</p>
    <a href="/movies" class="button">Voltar à Lista</a>
@endsection
