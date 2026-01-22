@extends('admin.layout')

@section('title', 'Dodaj film - Panel administracyjny')
@section('heading', 'Dodaj film')

@section('content')
<form method="POST" action="{{ route('admin.movies.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Tytuł</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Rok produkcji</label>
        <input type="number" name="release_year" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Opis</label>
        <textarea name="description" class="form-control" rows="5"></textarea>
    </div>

    @include('admin.movies.partials.relations')

    <div class="d-flex gap-2">
        <button class="btn btn-primary">Zapisz</button>
        <a href="{{ route('admin.movies.index') }}" class="btn btn-secondary">Anuluj</a>
    </div>
</form>
@endsection