<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Panel administracyjny')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #0f172a; /* granat */
            color: #e5e7eb;
        }

        .sidebar {
            min-height: 100vh;
            background: #020617;
        }

        .sidebar a {
            color: #e5e7eb;
            text-decoration: none;
            display: block;
            padding: .75rem 1rem;
        }

        .sidebar a:hover,
        .sidebar a:focus-visible {
            background: #1e293b;
            outline: none;
        }

        .sidebar .active {
            background: #2563eb;
        }

        main {
            background: #020617;
            min-height: 100vh;
            padding: 2rem;
        }

        table {
            background: #020617;
        }

        th, td {
            color: #e5e7eb;
            vertical-align: middle;
        }

        a:focus-visible,
        button:focus-visible {
            outline: 3px solid #facc15;
            outline-offset: 2px;
        }

        .skip-link {
            position: absolute;
            left: -9999px;
        }

        .skip-link:focus {
            left: 1rem;
            top: 1rem;
            background: #facc15;
            color: #000;
            padding: .5rem 1rem;
            z-index: 1000;
        }
    </style>
</head>

<body>

<a href="#content" class="skip-link">Przejdź do treści</a>

<div class="container-fluid">
    <div class="row">

        {{-- SIDEBAR --}}
        <nav class="col-md-3 col-lg-2 sidebar p-0" aria-label="Panel administratora">
            <h2 class="h5 text-center py-3 border-bottom">🎬 Admin Panel</h2>

            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.users.index') }}">Użytkownicy</a>
            <a href="{{ route('admin.movies.index') }}">Filmy</a>
            <a href="{{ route('admin.actors.index') }}">Aktorzy</a>
            <a href="{{ route('admin.directors.index') }}">Reżyserzy</a>
            <a href="{{ route('admin.reviews.index') }}">Recenzje</a>

            <hr class="border-secondary">

            <div class="px-3 small">
                <p class="mb-1">Zalogowany jako:</p>
                <strong>{{ auth()->user()->name }}</strong>

                <form method="POST" action="{{ route('logout') }}" class="mt-2">
                    @csrf
                    <button class="btn btn-sm btn-outline-light w-100">
                        Wyloguj
                    </button>
                </form>
            </div>
        </nav>

        {{-- CONTENT --}}
        <main id="content" class="col-md-9 col-lg-10" tabindex="-1">
            <h1 class="h3 mb-4">@yield('heading')</h1>

            @yield('content')
        </main>

    </div>
</div>

</body>
</html>