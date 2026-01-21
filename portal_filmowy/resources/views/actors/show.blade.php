@extends('layout')

@section('title',$actor->first_name.' '.$actor->last_name)

@section('content')
<h1>{{ $actor->first_name }} {{ $actor->last_name }}</h1>
<p><strong>Data urodzin:</strong> {{$actor->birthday}}</p>
<a>{{$actor->bio}}</a>

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