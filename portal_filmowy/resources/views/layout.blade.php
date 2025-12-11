<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Portal Filmowy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">🎥 Portal Filmowy</a>
        <div>
            <a class="nav-link d-inline text-light" href="{{ route('home') }}">Strona główna</a>
            <a class="nav-link d-inline text-light" href="{{ route('o-autorze') }}">O autorze</a>
            <a class="nav-link d-inline text-light" href="{{ route('home') }}">Galeria</a>
            <a class="nav-link d-inline text-light" href="{{ route('home') }}">Dodaj recenzję</a>
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>
</body>
</html>