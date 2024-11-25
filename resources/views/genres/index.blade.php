@extends('layouts.app')

@section('content')
<style>
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .title {
        font-size: 2rem;
        color: #333;
        margin: 0;
    }

    .create-btn {
        background-color: #4CAF50;
        color: white;
        padding: 0.8rem 1.5rem;
        border: none;
        border-radius: 6px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .create-btn:hover {
        background-color: #45a049;
        color: white;
    }

    .genres-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .genre-item {
        display: flex;
        align-items: center;
        padding: 1rem;
        margin-bottom: 0.8rem;
        background-color: #f8f9fa;
        border-radius: 6px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .genre-item:hover {
        transform: translateX(5px);
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .genre-name {
        flex-grow: 1;
        font-size: 1.1rem;
        color: #444;
    }

    .actions {
        display: flex;
        gap: 0.8rem;
        align-items: center;
    }

    .edit-btn {
        color: #2196F3;
        text-decoration: none;
        padding: 0.5rem 1rem;
        border: 1px solid #2196F3;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .edit-btn:hover {
        background-color: #2196F3;
        color: white;
    }

    .delete-btn {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .delete-btn:hover {
        background-color: #c82333;
    }

    @media (max-width: 768px) {
        .header {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }

        .genre-item {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }

        .actions {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="header">
    <h1 class="title">Lista de Gêneros</h1>
    <a href="{{ route('genres.create') }}" class="create-btn">Criar Novo Gênero</a>
</div>

<ul class="genres-list">
    @foreach ($genres as $genre)
        <li class="genre-item">
            <span class="genre-name">{{ $genre->name }}</span>
            <div class="actions">
                <a href="{{ route('genres.edit', $genre->id) }}" class="edit-btn">Editar</a>
                <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn">Excluir</button>
                </form>
            </div>
        </li>
    @endforeach
</ul>
@endsection
