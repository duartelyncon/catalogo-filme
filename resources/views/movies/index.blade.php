@extends('layouts.app')

@section('title', 'Lista de Filmes')

@section('content')
    <h2>Lista de Filmes</h2>

    <!-- Formulário de busca -->
    <form action="/movies" method="GET" style="margin-bottom: 20px;">
        <input type="text" name="search" placeholder="Buscar filmes..." value="{{ request('search') }}" class="input">
        <button type="submit" class="button">Buscar</button>
    </form>

    <a href="/movies/create" class="button">Adicionar Novo Filme</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Gênero</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($movies as $movie)
                <tr>
                    <td>{{ $movie->id }}</td>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->genre->name }}</td>
                    <td>
                        <a href="/movies/{{ $movie->id }}/edit" class="button">Editar</a>
                        <form action="/movies/{{ $movie->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button">Deletar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhum filme encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
