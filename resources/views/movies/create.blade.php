@extends('layouts.app')

@section('title', 'Добавить фильм')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/create.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endpush

@section('content')
  <h1 class="create-movie-title">Добавить фильм</h1>

  <div class="create-movie-container">
    <form method="POST" action="{{ route('movies.store') }}">
      @csrf

      <div class="form-group">
        <label class="form-label">Название *</label>
        <input type="text" name="title" value="{{ old('title') }}" class="form-input">
        @error('title') <p class="error-message">{{ $message }}</p> @enderror
      </div>

      <div class="form-grid">
        <div>
          <label class="form-label">Год *</label>
          <input type="number" name="year" value="{{ old('year') }}" class="form-input">
          @error('year') <p class="error-message">{{ $message }}</p> @enderror
        </div>
        <div>
          <label class="form-label">Жанр *</label>
          <input type="text" name="genre" value="{{ old('genre') }}" class="form-input">
          @error('genre') <p class="error-message">{{ $message }}</p> @enderror
        </div>
        <div>
          <label class="form-label">Длительность (мин) *</label>
          <input type="number" name="duration" value="{{ old('duration') }}" class="form-input">
          @error('duration') <p class="error-message">{{ $message }}</p> @enderror
        </div>
      </div>

      <div class="form-group">
        <label class="form-label">Режиссёр *</label>
        <input type="text" name="director" value="{{ old('director') }}" class="form-input">
        @error('director') <p class="error-message">{{ $message }}</p> @enderror
      </div>

      <div class="form-group">
        <label class="form-label">Описание *</label>
        <textarea name="description" rows="4" class="form-textarea">{{ old('description') }}</textarea>
        @error('description') <p class="error-message">{{ $message }}</p> @enderror
      </div>

      <div class="form-actions">
        <button type="submit" class="btn btn-primary">Добавить</button>
        <a href="{{ route('movies.index') }}" class="btn">Отмена</a>
      </div>
    </form>
  </div>
@endsection