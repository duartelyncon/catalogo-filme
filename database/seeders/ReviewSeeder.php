<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Movie;

class ReviewSeeder extends Seeder
{

    public function run()
    {
        $movies = Movie::all(); //pegando os filmes cadastrados

        foreach ($movies as $movie) {
            for ($i=1; $i <= 3; $i++){ // 3 avaliações
                Review::create([
                    'movie_id' => $movie->id, //relacionamento com filme
                    'rating' => rand(1, 5), // nota aleatoria
                    'comment' => "Comentario $i sobre o filme {$movie->title}.",
                ]);
            }
        }
    }
}
