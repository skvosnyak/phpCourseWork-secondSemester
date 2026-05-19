@extends('layouts.app')

@section('title', $movie->title)

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/show.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endpush

@section('content')
  <div class="back-link">
    <a href="{{ route('movies.index') }}" class="btn">← Назад</a>
  </div>

  <div class="movie-detail-container">
    <div class="movie-header">
      <h1 class="movie-title">{{ $movie->title }}</h1>
      <span class="movie-rating">⭐ {{ $movie->averageRating() }}</span>
    </div>
    <p class="movie-meta">
      {{ $movie->genre }} · {{ $movie->year }} · {{ $movie->director }} · {{ $movie->duration }} мин.
    </p>
    <p class="movie-description">{{ $movie->description }}</p>
    <div class="movie-actions">
      <a href="{{ route('movies.edit', $movie) }}" class="btn">Редактировать</a>
      <form method="POST" action="{{ route('movies.destroy', $movie) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Удалить фильм?')">Удалить</button>
      </form>
    </div>
  </div>

  <div class="reviews-section">
    <h2 class="reviews-title">Рецензии ({{ $movie->reviews->count() }})</h2>

    @forelse($movie->reviews as $review)
      <div class="review-card">
        <div class="review-header">
          <strong class="review-author">{{ $review->author }}</strong>
          <span class="review-rating">⭐ {{ $review->rating }}/10</span>
        </div>
        <p class="review-text">{{ $review->text }}</p>
      </div>
    @empty
      <p class="empty-reviews">Рецензий пока нет. Будьте первым!</p>
    @endforelse
  </div>

  <div class="add-review-container">
    <h3 class="add-review-title">Добавить рецензию</h3>
    <form method="POST" action="{{ route('reviews.store', $movie) }}">
      @csrf
      <div class="review-form-group">
        <label class="review-form-label">Ваше имя</label>
        <input type="text" name="author" class="review-form-input" value="{{ old('author') }}">
        @error('author') <p class="error-message">{{ $message }}</p> @enderror
      </div>
      <div class="review-form-group">
        <label class="review-form-label">Рецензия</label>
        <textarea name="text" rows="3" class="review-form-textarea">{{ old('text') }}</textarea>
        @error('text') <p class="error-message">{{ $message }}</p> @enderror
      </div>
      <div class="review-form-group">
        <label class="review-form-label">Оценка (1-10)</label>
        <input type="number" name="rating" min="1" max="10" class="rating-input" value="{{ old('rating') }}">
        @error('rating') <p class="error-message">{{ $message }}</p> @enderror
      </div>
      <div class="submit-review-btn">
        <button type="submit" class="btn btn-primary">Отправить</button>
      </div>
    </form>
  </div>
@endsection