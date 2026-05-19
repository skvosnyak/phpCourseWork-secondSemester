<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Каталог фильмов')</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
  <nav>
    <a href="{{ route('movies.index') }}">🎬 Каталог фильмов</a>
    <a href="{{ route('movies.create') }}">+ Добавить фильм</a>
  </nav>
  <div class="container">
    @yield('content')
  </div>
</body>

</html>