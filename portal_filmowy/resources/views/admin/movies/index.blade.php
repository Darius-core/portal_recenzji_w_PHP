@extends('admin.layout')

@section('title', 'Filmy - Panel administracyjny')
@section('heading', 'Filmy')

@section('content')
<a href="{{ route('admin.movies.create') }}" class="btn btn-primary mb-3">➕ Dodaj film</a>

@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<table class="table table-striped table-hover" aria-label="Lista filmów">
    <thead class="table-dark">
        <tr>
            <th scope="col">Tytuł</th>
            <th scope="col">Rok</th>
            <th scope="col">Średnia ocena</th>
            <th scope="col">Akcje</th>
        </tr>
    </thead>
    <tbody>
        @foreach($movies as $movie)
        <tr>
            <td>{{ $movie->title }}</td>
            <td>{{ $movie->release_year }}</td>
            <td>{{ number_format($movie->averageRating() ?? 0, 1) }}</td>
            <td>
                <a href="{{ route('admin.movies.edit', $movie) }}" class="btn btn-sm btn-warning mb-1">✏️ Edytuj</a>

                <form action="{{ route('admin.movies.destroy', $movie) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Usunąć film?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger mb-1">🗑 Usuń</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $movies->links('pagination::bootstrap-5') }}
@endsection