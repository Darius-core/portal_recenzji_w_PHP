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
    <input type="number" name="year" required>
</label>

<label>
    Opis
    <textarea name="description" rows="5"></textarea>
</label>

@include('admin.movies.partials.relations')

<button>Zapisz</button>
</form>
@endsection