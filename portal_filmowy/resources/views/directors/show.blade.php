@extends('layout')

@section('title',$director->first_name.' '.$director->last_name)

@section('content')
<h1>{{ $director->first_name }} {{ $director->last_name }}</h1>

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