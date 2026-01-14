@extends('admin.layout')

@section('content')
<h1>Edytuj aktora</h1>

<form method="POST" action="{{ route('admin.actors.update',$actor) }}">
@csrf
@method('PUT')

<label>
    Imię
    <input type="text" name="first_name" value="{{ $actor->first_name }}" required>
</label>

<label>
    Nazwisko
    <input type="text" name="last_name" value="{{ $actor->last_name }}" required>
</label>

<button>Zapisz zmiany</button>
</form>
@endsection