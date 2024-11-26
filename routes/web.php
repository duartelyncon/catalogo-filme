<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReviewController;


// inicio

Route::get('/', function () {
    return view('welcome');
});

// Generos CRUD
Route::get('genres', [GenreController::class, 'index'])->name('genres.index'); // lista genero
Route::get('genres/create', [GenreController::class, 'create'])->name('genres.create'); // form criação
Route::post('genres', [GenreController::class, 'store'])->name('genres.store'); // guarda genero
Route::get('genres/{genre}/edit', [GenreController::class, 'edit'])->name('genres.edit'); // form edit
Route::put('genres/{genre}', [GenreController::class, 'update'])->name('genres.update'); // att genero
Route::delete('genres/{genre}', [GenreController::class, 'destroy'])->name('genres.destroy'); // del genero

// Filmes CRUD
Route::get('movies', [MovieController::class, 'index'])->name('movies.index'); // lista filmes
Route::get('movies/create', [MovieController::class, 'create'])->name('movies.create'); // form criação
Route::post('movies', [MovieController::class, 'store'])->name('movies.store'); // guarda filme
Route::get('movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit'); // form edit
Route::put('movies/{movie}', [MovieController::class, 'update'])->name('movies.update'); // att filme
Route::delete('movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy'); // del filme

// Avaliações rota
Route::post('movies/{movie}/reviews', [ReviewController::class, 'store'])->name('reviews.store'); // rota de avaliações

