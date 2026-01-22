<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>@yield('title','Portal filmowy')</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/css/app.css">
</head>

<body class="font-normal">



<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Główna nawigacja">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">🎬 Portal filmowy</a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="menu" class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('movies.index') }}">Filmy</a>
                    <a href="{{ route('o_stronie') }}">O Stronie</a>
               </li>
            </ul>

            <div class="d-flex gap-2">
                {{-- WCAG --}}
                <button id="toggle-contrast" class="btn btn-outline-light btn-sm">Kontrast</button>
                <button id="font-plus" class="btn btn-outline-light btn-sm">A+</button>
                <button id="font-normal" class="btn btn-outline-light btn-sm">A</button>

                @auth
                    <span class="text-light align-self-center me-2">
                        {{ auth()->user()->name }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-danger btn-sm">Wyloguj</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Logowanie</a>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Rejestracja</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<main id="content" class="container py-4" tabindex="-1">
    @yield('content')
</main>

<footer class="bg-dark text-light text-center py-3">
    © {{ date('Y') }} Portal filmowy
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="/js/accessibility.js"></script>

</body>
</html>