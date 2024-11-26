@extends('layouts.app')

@section('title', 'Bem-vindo')

@section('content')
    <h2>Bem-vindo ao Sistema de Filmes!</h2>
    <p>Escolha uma das opções abaixo:</p>
    <a href="/genres" class="button">Gerenciar Gêneros</a>
    <a href="/movies" class="button">Gerenciar Filmes</a>
@endsection
