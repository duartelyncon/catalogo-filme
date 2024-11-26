@extends('layouts.app')

@section('title', 'Lista de Gêneros')

@section('content')
    <h2>Lista de Gêneros</h2>

    <!-- Formulário de busca -->
    <form action="/genres" method="GET" style="margin-bottom: 20px;">
        <input type="text" name="search" placeholder="Buscar gêneros..." value="{{ request('search') }}" class="input">
        <button type="submit" class="button">Buscar</button>
    </form>

    <a href="/genres/create" class="button">Adicionar Novo Gênero</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($genres as $genre)
                <tr>
                    <td>{{ $genre->id }}</td>
                    <td>{{ $genre->name }}</td>
                    <td>
                        <a href="/genres/{{ $genre->id }}/edit" class="button">Editar</a>
                        <form action="/genres/{{ $genre->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button">Deletar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhum gênero encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
