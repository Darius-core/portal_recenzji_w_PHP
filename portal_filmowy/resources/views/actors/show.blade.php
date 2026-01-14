@extends('layout')

@section('title',$actor->name.' '.$actor->surname)

@section('content')
<h1>{{ $actor->name }} {{ $actor->surname }}</h1>

<h2>Filmy</h2>
<ul>
@foreach($actor->movies as $movie)
<li>
<a href="{{ route('movies.show',$movie) }}">
{{ $movie->title }}
</a>
</li>
@endforeach
</ul>
@endsection