@extends('layout')

@section('title',$actor->first_name.' '.$actor->last_name)

@section('content')
<article aria-labelledby="actor-name">

<h1 id="actor-name">
{{ $actor->first_name }} {{ $actor->last_name }}
</h1>

<p><strong>Data urodzin:</strong> {{ $actor->birthday }}</p>

<section aria-labelledby="actor-bio">
<h2 id="actor-bio">Biografia</h2>
<p>{{ $actor->bio }}</p>
</section>

<section aria-labelledby="actor-movies">
<h2 id="actor-movies">Filmy</h2>
<ul>
@foreach($actor->movies as $movie)
<li>
<a href="{{ route('movies.show',$movie) }}">
{{ $movie->title }}
</a>
</li>
@endforeach
</ul>
</section>

</article>
@endsection