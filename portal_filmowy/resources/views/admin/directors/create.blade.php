@extends('admin.layout')

@section('content')
<h1>Dodaj reżysera</h1>

<form method="POST" action="{{ route('admin.directors.store') }}">
@csrf

<label>
    Imię
    <input type="text" name="first_name" required>
</label>

<label>
    Nazwisko
    <input type="text" name="last_name" required>
</label>

<button>Zapisz</button>
</form>
@endsection