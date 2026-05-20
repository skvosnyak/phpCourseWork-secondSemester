@extends('layouts.app')

@section('title', 'Каталог фильмов')

@section('content')
  <h1 style="margin: 2rem 0 1rem;">Каталог фильмов</h1>

  <div style="display:flex; gap:12px; margin-bottom:1.5rem;">
    <input type="text" id="searchInput" placeholder="Поиск по названию..."
      style="padding:8px 12px; border:1px solid #ddd; border-radius:8px; font-size:14px; flex:1;">

    <select id="genreFilter" style="padding:8px 12px; border:1px solid #ddd; border-radius:8px; font-size:14px;">
      <option value="">Все жанры</option>
      @foreach($genres as $genre)
        <option value="{{ $genre }}">{{ $genre }}</option>
      @endforeach
    </select>
  </div>

  <div id="moviesList">
    @forelse($movies as $movie)
      <div class="movie-card" data-genre="{{ $movie->genre }}" data-title="{{ $movie->title }}"
        style="background:#fff; border:1px solid #e0e0e0; border-radius:12px; padding:1.25rem; margin-bottom:1rem;">
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
  </div>
@endsection

@push('scripts')
  <script>
    const filter = document.getElementById('genreFilter');
    const search = document.getElementById('searchInput');

    function applyFilters() {
      const selectedGenre = filter.value.toLowerCase();
      const searchText = search.value.toLowerCase();

      document.querySelectorAll('.movie-card').forEach(card => {
        const genre = card.dataset.genre.toLowerCase();
        const title = card.dataset.title.toLowerCase();

        const matchesGenre = !selectedGenre || genre === selectedGenre;
        const matchesSearch = !searchText || title.includes(searchText);

        card.style.display = matchesGenre && matchesSearch ? 'block' : 'none';
      });
    }

    filter.addEventListener('change', applyFilters);
    search.addEventListener('input', applyFilters);
  </script>
@endpush