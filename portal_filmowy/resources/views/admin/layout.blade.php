<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<title>Admin Panel</title>

<style>
body { background:#000; color:#fff; font-family:sans-serif; }
nav a { margin-right:1rem; }
a:focus-visible { outline:3px solid yellow; }
table { width:100%; border-collapse:collapse; }
th, td { border:1px solid #444; padding:0.5rem; }
</style>
</head>

<body>
<nav aria-label="Panel administratora">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <a href="{{ route('admin.users.index') }}">Użytkownicy</a>
    <a href="{{ route('admin.movies.index') }}">Filmy</a>
    <a href="{{ route('admin.actors.index') }}">Aktorzy</a>
    <a href="{{ route('admin.directors.index') }}">Reżyserzy</a>
    <a href="{{ route('admin.reviews.index') }}">Recenzje</a>
</nav>

<main tabindex="-1">
    @yield('content')
</main>
</body>
</html>