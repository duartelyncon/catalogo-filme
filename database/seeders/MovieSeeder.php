<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre;

class MovieSeeder extends Seeder
{

    public function run()
    {
        $genres = Genre::all(); //pegando os generos já cadastrados

        foreach ($genres as $genre) {
            for ($i = 1; $i <= 5; $i++){ //5 filmes por genero
                Movie::create([
                    'title' => "Filme $i do gênero {$genre->name}",
                    'synopsis' => "Uma breve sinopse sobre o filme $i do gênero {$genre->name}.",
                    'release_date' => now()->subDays(rand(1, 365)), // data aleatoria
                    'genre_id' => $genre->id, // relacionamento com o genero
                ]);
            }
        }
    }
}
