@extends('layout')

@section('title','Filmy')

@section('content')
<h1>Lista filmów</h1>

<section class="grid">
@foreach($movies as $movie)
<article>
    <h2>{{ $movie->title }}</h2>
    <p>Rok: {{ $movie->release_year }}</p>
    <p>⭐ {{ $movie->averageRating() ?? 'brak' }}/10</p>

    <a href="{{ route('movies.show',$movie) }}"
       aria-label="Szczegóły filmu {{ $movie->title }}">
       Szczegóły
    </a>
</article>
@endforeach
</section>

{{ $movies->links() }}
@endsection