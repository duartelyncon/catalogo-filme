@extends('layouts.app')

@section('content')
<style>


.movies-container {
    max-width: 900px;
    margin: 20px auto;
    padding: 0 20px;
}

.page-title {
    color: #333;
    margin-bottom: 30px;
    font-size: 2em;
}

.search-section {
    margin-bottom: 25px;
    display: flex;
    gap: 10px;
}

.search-input {
    padding: 8px 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    flex-grow: 1;
    max-width: 300px;
}

.action-btn {
    padding: 8px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: 500;
    transition: background-color 0.2s;
    text-decoration: none;
    display: inline-block;
}

.btn-search {
    background-color: #6c757d;
    color: white;
}

.btn-create {
    background-color: #007bff;
    color: white;
    margin-bottom: 20px;
}

.action-btn:hover {
    opacity: 0.9;
}

.movies-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.movie-item {
    display: flex;
    align-items: center;
    padding: 15px;
    border-bottom: 1px solid #eee;
    gap: 15px;
}

.movie-title {
    flex-grow: 1;
}

.genre-badge {
    background-color: #e9ecef;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.9em;
    color: #666;
}

.action-buttons {
    display: flex;
    gap: 10px;
}

.btn-edit {
    background-color: #ffc107;
    color: #000;
}

.btn-delete {
    background-color: #dc3545;
    color: white;
}

.pagination {
    margin-top: 20px;
    display: flex;
    justify-content: center;
}
</style>
<div class="movies-container">
    <h1 class="page-title">Lista de Filmes</h1>

    <div class="search-section">
        <form method="GET" action="{{ route('movies.index') }}" style="display: flex; gap: 10px; flex-grow: 1;">
            <input
                type="text"
                name="search"
                placeholder="Pesquisar Filme"
                value="{{ request()->search }}"
                class="search-input"
            >
            <button type="submit" class="action-btn btn-search">Buscar</button>
        </form>
    </div>

    <a href="{{ route('movies.create') }}" class="action-btn btn-create">Criar Novo Filme</a>

    <ul class="movies-list">
        @foreach ($movies as $movie)
            <li class="movie-item">
                <span class="movie-title">{{ $movie->title }}</span>
                <span class="genre-badge">{{ $movie->genre->name }}</span>
                <div class="action-buttons">
                    <a href="{{ route('movies.edit', $movie->id) }}" class="action-btn btn-edit">Editar</a>
                    <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-btn btn-delete">Excluir</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

    <div class="pagination">
        {{ $movies->links() }}
    </div>
</div>
@endsection
