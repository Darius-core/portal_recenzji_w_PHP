<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title','Portal filmowy')</title>

<link rel="stylesheet" href="/css/app.css">

</head>
<body>

<a href="#content" class="skip-link">Przejdź do treści</a>

<header>
<nav aria-label="Główna nawigacja">
    <a href="{{ route('home') }}">🎬 Portal filmowy</a>
    <a href="{{ route('movies.index') }}">Filmy</a>

    @auth
        <span>Witaj, {{ auth()->user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button>Wyloguj</button>
        </form>
    @else
        <a href="{{ route('login') }}">Logowanie</a>
        <a href="{{ route('register') }}">Rejestracja</a>
    @endauth
</nav>
</header>

<main id="content">
    @yield('content')
</main>

<footer>
    <p>© {{ date('Y') }} Portal filmowy</p>
</footer>

</body>
</html>