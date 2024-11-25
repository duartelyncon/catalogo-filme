@extends('layouts.app')

@section('content')
<style>
    .edit-container {
        max-width: 600px;
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

    .form-input {
        width: 100%;
        padding: 0.8rem;
        font-size: 1rem;
        border: 2px solid #ddd;
        border-radius: 6px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-input:focus {
        outline: none;
        border-color: #4CAF50;
        box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
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
        transition: background-color 0.3s ease, transform 0.2s ease;
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

    /* Estilo para mensagens de erro de validação */
    .error-message {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.5rem;
    }

    @media (max-width: 768px) {
        .edit-container {
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

<div class="edit-container">
    <h1 class="page-title">Editar Gênero</h1>

    <form action="{{ route('genres.update', $genre->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name" class="form-label">Nome do Gênero</label>
            <input
                type="text"
                id="name"
                name="name"
                class="form-input"
                value="{{ old('name', $genre->name) }}"
                required
                autofocus
            >
            @error('name')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="btn-container">
            <button type="submit" class="btn-submit">Atualizar Gênero</button>
            <a href="{{ route('genres.index') }}" class="btn-cancel">Cancelar</a>
        </div>
    </form>
</div>
@endsection
