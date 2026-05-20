@extends('layouts.app')

@section('title', 'Редактировать ' . $movie->title)

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endpush

@section('content')
  <h1>Редактировать фильм</h1>

  <div class="edit-movie-container" style="padding: 2rem;">
    <form method="POST" action="{{ route('movies.update', $movie) }}">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label class="form-label">Название *</label>
        <input type="text" name="title" value="{{ old('title', $movie->title) }}" class="form-input" required>
        @error('title') <p class="error-message">{{ $message }}</p> @enderror
      </div>

      <div class="form-grid">
        <div class="form-group">
          <label class="form-label">Год *</label>
          <input type="number" name="year" value="{{ old('year', $movie->year) }}" class="form-input" required>
          @error('year') <p class="error-message">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
          <label class="form-label">Жанр *</label>
          <input type="text" name="genre" value="{{ old('genre', $movie->genre) }}" class="form-input" required>
          @error('genre') <p class="error-message">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
          <label class="form-label">Длительность (мин) *</label>
          <input type="number" name="duration" value="{{ old('duration', $movie->duration) }}" class="form-input"
            required>
          @error('duration') <p class="error-message">{{ $message }}</p> @enderror
        </div>
      </div>

      <div class="form-group">
        <label class="form-label">Режиссёр *</label>
        <input type="text" name="director" value="{{ old('director', $movie->director) }}" class="form-input" required>
        @error('director') <p class="error-message">{{ $message }}</p> @enderror
      </div>

      <div class="form-group">
        <label class="form-label">Описание *</label>
        <textarea name="description" rows="5" class="form-textarea"
          required>{{ old('description', $movie->description) }}</textarea>
        @error('description') <p class="error-message">{{ $message }}</p> @enderror
      </div>

      <div class="form-actions">
        <button type="submit" class="btn btn-primary">💾 Сохранить</button>
        <a href="{{ route('movies.show', $movie) }}" class="btn btn-secondary">Отмена</a>
      </div>
    </form>
  </div>
@endsection