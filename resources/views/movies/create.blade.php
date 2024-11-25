@extends('layouts.app')

@section('content')
<style>
    .create-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .page-title {
        color: #333;
        font-size: 2rem;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #eee;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 0.5rem;
        font-weight: 500;
    }

    .form-input,
    .form-select,
    .form-textarea {
        width: 100%;
        padding: 0.8rem;
        font-size: 1rem;
        border: 2px solid #ddd;
        border-radius: 6px;
        transition: all 0.3s ease;
        background-color: white;
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        outline: none;
        border-color: #4CAF50;
        box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
    }

    .form-textarea {
        min-height: 150px;
        resize: vertical;
        font-family: inherit;
        line-height: 1.5;
    }

    .form-select {
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23666' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 1em;
        padding-right: 2.5rem;
    }

    .btn-container {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }

    .btn-submit {
        background-color: #4CAF50;
        color: white;
        padding: 0.8rem 2rem;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #45a049;
        transform: translateY(-1px);
    }

    .btn-cancel {
        background-color: #f8f9fa;
        color: #666;
        padding: 0.8rem 2rem;
        border: 1px solid #ddd;
        border-radius: 6px;
        cursor: pointer;
        font-size: 1rem;
        text-decoration: none;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    .btn-cancel:hover {
        background-color: #e9ecef;
    }

    .error-message {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.5rem;
    }

    @media (max-width: 768px) {
        .create-container {
            padding: 0 1rem;
        }

        .btn-container {
            flex-direction: column;
        }

        .btn-submit,
        .btn-cancel {
            width: 100%;
        }
    }
</style>

<div class="create-container">
    <h1 class="page-title">Criar Novo Filme</h1>

    <form action="{{ route('movies.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title" class="form-label">Título</label>
            <input
                type="text"
                id="title"
                name="title"
                class="form-input"
                value="{{ old('title') }}"
                required
                autofocus
                placeholder="Digite o título do filme"
            >
            @error('title')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="genre_id" class="form-label">Gênero</label>
            <select
                id="genre_id"
                name="genre_id"
                class="form-select"
                required
            >
                <option value="">Selecione um gênero</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
            @error('genre_id')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Descrição</label>
            <textarea
                id="description"
                name="description"
                class="form-textarea"
                placeholder="Digite a descrição do filme"
            >{{ old('description') }}</textarea>
            @error('description')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="btn-container">
            <button type="submit" class="btn-submit">Salvar Filme</button>
            <a href="{{ route('movies.index') }}" class="btn-cancel">Cancelar</a>
        </div>
    </form>
</div>
@endsection
