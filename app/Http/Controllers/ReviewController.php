<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // nova avaliação
    public function store(Request $request, Movie $movie)
    {
        $request->validate([
            'content' => 'required|max:500',
        ]);

        $movie->reviews()->create([
            'content' => $request->content,
        ]);

        return redirect()->route('movies.show', $movie);
    }
}
