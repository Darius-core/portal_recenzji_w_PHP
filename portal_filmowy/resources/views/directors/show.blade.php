@extends('layout')

@section('title',$director->name.' '.$director->surname)

@section('content')
<h1>{{ $director->name }} {{ $director->surname }}</h1>

<h2>Filmy</h2>
<ul>
@foreach($director->movies as $movie)
<li>
<a href="{{ route('movies.show',$movie) }}">
{{ $movie->title }}
</a>
</li>
@endforeach
</ul>
@endsection