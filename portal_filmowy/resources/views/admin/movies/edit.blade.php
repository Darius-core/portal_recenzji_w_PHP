@extends('admin.layout')

@section('title', 'Edytuj film - Panel administracyjny')
@section('heading', 'Edytuj film')

@section('content')
<form method="POST" action="{{ route('admin.movies.update', $movie) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Tytuł</label>
        <input type="text" name="title" class="form-control" value="{{ $movie->title }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Rok produkcji</label>
        <input type="number" name="release_year" class="form-control" value="{{ $movie->release_year }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Opis</label>
        <textarea name="description" class="form-control" rows="5">{{ $movie->description }}</textarea>
    </div>

    @include('admin.movies.partials.relations', ['movie' => $movie])

    <div class="d-flex gap-2">
        <button class="btn btn-primary">Zapisz zmiany</button>
        <a href="{{ route('admin.movies.index') }}" class="btn btn-secondary">Anuluj</a>
    </div>
</form>
@endsection