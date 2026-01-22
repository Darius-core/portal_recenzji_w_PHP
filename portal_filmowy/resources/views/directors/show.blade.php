@extends('layout')

@section('title',$director->first_name.' '.$director->last_name)

@section('content')
<article aria-labelledby="director-name">

<h1 id="director-name">
{{ $director->first_name }} {{ $director->last_name }}
</h1>

<p><strong>Data urodzin:</strong> {{ $director->birthday }}</p>

<section aria-labelledby="director-bio">
<h2 id="director-bio">Biografia</h2>
<p>{{ $director->bio }}</p>
</section>

<section aria-labelledby="director-movies">
<h2 id="director-movies">Filmy</h2>
<ul>
@foreach($director->movies as $movie)
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