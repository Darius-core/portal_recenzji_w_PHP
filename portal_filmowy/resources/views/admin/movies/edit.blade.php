@extends('admin.layout')

@section('content')
<h1>Edytuj film</h1>

    <form method="POST" action="{{ route('admin.movies.update',$movie) }}">
    @csrf
    @method('PUT')

    <label>
        Tytuł
        <input type="text" name="title" value="{{ $movie->title }}" required>
    </label>

    <label>
        Rok produkcji
        <input type="number" name="release_year" value="{{ $movie->release_year }}" required>
    </label>

    <label>
        Opis
        <textarea name="description" rows="5">{{ $movie->description }}</textarea>
    </label>

    @include('admin.movies.partials.relations', ['movie' => $movie])

        <div class="d-flex gap-2">
            <button class="btn btn-primary">Zapisz zmiany</button>
            <a href="{{ route('admin.movies.index') }}" class="btn btn-secondary">
                Anuluj
            </a>
        </div>
    </form>
@endsection