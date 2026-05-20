<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Каталог фильмов')</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  @stack('styles')
</head>

<body>
  <nav>
    <a href="{{ route('movies.index') }}">🎬 Каталог фильмов</a>
    <div style="display:flex; gap:12px; align-items:center;">
      @if(session('is_admin'))
        <a href="{{ route('movies.create') }}">+ Добавить фильм</a>
        <form method="POST" action="{{ route('logout') }}" style="margin:0;">
          @csrf
          <button type="submit"
            style="background:none; border:none; color:#fff; cursor:pointer; font-size:15px;">Выйти</button>
        </form>
      @else
        <a href="{{ route('login') }}">Войти</a>
      @endif
    </div>
  </nav>
  <div class="container">
    @yield('content')
  </div>
  @stack('scripts')
</body>

</html>