<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{


    public function run()
    {
        $genres = ['Ação', 'Comédia', 'Drama', 'Terror', 'Romance', 'Fantasia'];

        foreach ($genres as $genre) {
            Genre::create(['name' => $genre]);
        }
    }
}
