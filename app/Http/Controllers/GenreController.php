<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    // listar generos
    public function index(Request $request)
    {
        $genres = Genre::when($request->search, function ($query) use ($request) {
            $query->where('name', 'like', "%{$request->search}%");
        })->get();

        return view('genres.index', compact('genres'));
    }

    //formulario de genero
    public function create()
    {
        return view('genres.create');
    }

    // guardando genero
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:genres|max:255',
        ]);

        Genre::create($request->all());
        return redirect()->route('genres.index');
    }



    public function show(string $id)
    {

        $genre = Genre::findOrFail($id);
        $movies = $genre->movies;
        return view('genres.show', compact('genre', 'movies'));
    }

    //form edit genero
    public function edit(Genre $genre)
    {
        return view('genres.edit', compact('genre'));
    }

    //atualizar genero
    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'name' => 'required|unique:genres,name,'.$genre->id .'|max:255',
        ]);
        $genre->update($request->all());
        return redirect()->route('genres.index');
    }

    // apaga um genero
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genres.index');;
    }
}
