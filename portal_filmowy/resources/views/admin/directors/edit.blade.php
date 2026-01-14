@extends('admin.layout')

@section('content')
<h1>Edytuj reżysera</h1>

<form method="POST" action="{{ route('admin.directors.update',$director) }}">
@csrf
@method('PUT')

<label>
    Imię
    <input type="text" name="first_name" value="{{ $director->first_name }}" required>
</label>

<label>
    Nazwisko
    <input type="text" name="last_name" value="{{ $director->last_name }}" required>
</label>

<button>Zapisz zmiany</button>
</form>
@endsection