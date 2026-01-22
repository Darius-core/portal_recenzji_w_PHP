@extends('admin.layout')

@section('content')
<h1>Dodaj film</h1>

<form method="POST" action="{{ route('admin.movies.store') }}">
@csrf

<label>
    Tytuł
    <input type="text" name="title" required>
</label>

<label>
    Rok produkcji
    <input type="number" name="release_year" required>
</label>

<label>
    Opis
    <textarea name="description" rows="5"></textarea>
</label>

@include('admin.movies.partials.relations')

        <div class="d-flex gap-2">
            <button class="btn btn-primary">Zapisz </button>
            <a href="{{ route('admin.movies.index') }}" class="btn btn-secondary">
                Anuluj
            </a>
        </div>
</form>
@endsection