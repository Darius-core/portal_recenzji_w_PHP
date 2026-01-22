<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title','Portal filmowy')</title>

<link rel="stylesheet" href="/css/app.css">

</head>

@php
$font = session('font_size', 'normal');
$contrast = session('high_contrast') ? 'high-contrast' : '';
@endphp

<body class="font-{{ $font }} {{ $contrast }}">

<a href="#content" class="skip-link">Przejdź do treści</a>

<header>
<nav aria-label="Główna nawigacja">
    <a href="{{ route('home') }}">🎬 Portal filmowy</a>
    <a href="{{ route('movies.index') }}">Filmy</a>
    <a href="{{ route('o_stronie') }}">O Stronie</a>

    {{-- WCAG --}}
    <form method="POST" action="{{ route('accessibility.font') }}" style="display:inline">
        @csrf
        <button name="size" value="large" aria-label="Zwiększ czcionkę">A+</button>
        <button name="size" value="normal" aria-label="Domyślna czcionka">A</button>
    </form>

    <form method="POST" action="{{ route('accessibility.contrast') }}" style="display:inline">
        @csrf
        <button aria-label="Przełącz wysoki kontrast">🌓 Kontrast</button>
    </form>

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