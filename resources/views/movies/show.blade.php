@extends('layouts.app')

@section('content')
<style>

.movie-details-container {
    max-width: 800px;
    margin: 20px auto;
    padding: 0 20px;
}

.movie-header {
    margin-bottom: 30px;
}

.movie-title {
    font-size: 2.5em;
    color: #333;
    margin-bottom: 10px;
}

.genre-badge {
    background-color: #e9ecef;
    padding: 6px 12px;
    border-radius: 15px;
    font-size: 1em;
    color: #666;
    display: inline-block;
    margin-bottom: 20px;
}

.movie-description {
    font-size: 1.1em;
    line-height: 1.6;
    color: #555;
    margin-bottom: 40px;
}

.reviews-section {
    background-color: #f8f9fa;
    padding: 25px;
    border-radius: 8px;
    margin-bottom: 30px;
}

.section-title {
    color: #333;
    font-size: 1.5em;
    margin-bottom: 20px;
}

.reviews-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.review-item {
    background-color: white;
    padding: 15px 20px;
    border-radius: 6px;
    margin-bottom: 15px;
    border: 1px solid #eee;
    line-height: 1.5;
}

.review-form {
    background-color: #f8f9fa;
    padding: 25px;
    border-radius: 8px;
}

.review-textarea {
    width: 100%;
    min-height: 120px;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin-bottom: 15px;
    font-family: inherit;
    resize: vertical;
}

.submit-btn {
    background-color: #28a745;
    color: white;
    padding: 10px 24px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 1em;
    transition: background-color 0.2s;
}

.submit-btn:hover {
    background-color: #218838;
}

/* Mensagem para quando não há avaliações */
.no-reviews {
    text-align: center;
    color: #666;
    font-style: italic;
    padding: 20px 0;
}
</style>
<div class="movie-details-container">
    <div class="movie-header">
        <h1 class="movie-title">{{ $movie->title }}</h1>
        <span class="genre-badge">{{ $movie->genre->name }}</span>

        <p class="movie-description">{{ $movie->description }}</p>
    </div>

    <div class="reviews-section">
        <h3 class="section-title">Avaliações</h3>

        @if($movie->reviews->count() > 0)
            <ul class="reviews-list">
                @foreach ($movie->reviews as $review)
                    <li class="review-item">{{ $review->content }}</li>
                @endforeach
            </ul>
        @else
            <p class="no-reviews">Ainda não há avaliações para este filme. Seja o primeiro a avaliar!</p>
        @endif
    </div>

    <div class="review-form">
        <h3 class="section-title">Adicionar Avaliação</h3>
        <form action="{{ route('reviews.store', $movie->id) }}" method="POST">
            @csrf
            <textarea
                name="content"
                required
                class="review-textarea"
                placeholder="Escreva sua avaliação aqui..."
            ></textarea>
            <button type="submit" class="submit-btn">Adicionar Avaliação</button>
        </form>
    </div>
</div>
@endsection
