@extends('admin.layout')

@section('content')
<h1>Panel administratora</h1>

<ul>
    <li>Liczba filmów: {{ $movies }}</li>
    <li>Liczba recenzji: {{ $reviews }}</li>
    <li>Liczba użytkowników: {{ $users }}</li>
</ul>
@endsection