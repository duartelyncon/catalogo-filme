<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Movie;


class MovieController extends Controller
{
    //listando filmes
    public function index(Request $request)
    {
        $movies = Movie::with('genre')
        ->when($request->search, function ($query) use ($request){
            $query->where('title', 'like', "%{$request->search}%");
        })
        ->paginate(10);
        return view ('movies.index', compact('movies'));
    }

    // form criação de filme
    public function create()
    {
        $genres = Genre::all();;
        return view('movies.create', compact('genres'));
    }

    //guardar novo filme
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:movies|max:255',
            'genre_id' => 'required|exists:genre,id',
            'description' => 'nullable',
        ]);

        Movie::create($request->all());
        return redirect()->route('movies.index');
    }

    //detalhes filme
    public function show(Movie $movie)
    {
        $genres = Genre::all();
        return view('movies.show', compact('movie'));
    }

    //form edição
    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        return view('movies.edit', compact('movie', 'genres'));
    }

    //atualizar
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|unique:movies,title,' . $movie->id . '|max:255',
            'genre_id' > 'required|exist::genres_id',
            'description' => 'nullable',
        ]);

        $movie->update($request->all());
        return redirect()->route('movies.index');
    }

    //apaga o filme
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index');
    }
}
