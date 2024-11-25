<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReviewController;

//generos crud
Route::get('genres', [GenreController::class, 'index']); // lista genero
Route::get('genres/create', [GenreController::class, 'create']); // form criacao
Route::post('genres', [GenreController::class, 'store']); // guarda genero
Route::get('genres/{genre}/edit', [GenreController::class, 'edit']); // form edit
Route::put('genres/{genre}', [GenreController::class, 'update']); // att genero
Route::delete('genres/{genre}', [GenreController::class, 'destroy']); // del genero

// filmes crud
Route::get('movies', [MovieController::class, 'index']); // lista filmes
Route::get('movies/create', [MovieController::class, 'create']); // form criaçao
Route::post('movies', [MovieController::class, 'store']); // guarda filme
Route::get('movies/{movie}/edit', [MovieController::class, 'edit']); // form edit
Route::put('movies/{movie}', [MovieController::class, 'update']); // att filme
Route::delete('movies/{movie}', [MovieController::class, 'destroy']); // del filme

// avaliacoes rota
Route::post('movies/{movie}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
