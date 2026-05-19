@extends('layouts.app')

@section('title', 'Каталог фильмов')

@section('content')
  <h1 style="margin: 2rem 0 1rem;">Каталог фильмов</h1>

  <form method="GET" action="{{ route('movies.index') }}" style="margin-bottom: 1.5rem;">
    <select name="genre" onchange="this.form.submit()">
      <option value="">Все жанры</option>
      @foreach($genres as $genre)
        <option value="{{ $genre }}" {{ request('genre') == $genre ? 'selected' : '' }}>
          {{ $genre }}
        </option>
      @endforeach
    </select>
  </form>

  @forelse($movies as $movie)
    <div style="background:#fff; border:1px solid #e0e0e0; border-radius:12px; padding:1.25rem; margin-bottom:1rem;">
      <div style="display:flex; justify-content:space-between; align-items:flex-start;">
        <div>
          <a href="{{ route('movies.show', $movie) }}"
            style="font-size:18px; font-weight:500; text-decoration:none; color:#212121;">
            {{ $movie->title }}
          </a>
          <p style="color:#888; font-size:13px; margin-top:4px;">
            {{ $movie->genre }} · {{ $movie->year }} · {{ $movie->director }}
          </p>
        </div>
        <span style="font-size:20px; font-weight:500;">⭐ {{ $movie->averageRating() }}</span>
      </div>
    </div>
  @empty
    <p>Фильмов пока нет. <a href="{{ route('movies.create') }}">Добавить первый</a></p>
  @endforelse
@endsection