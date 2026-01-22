@extends('layout')

@section('title','Filmy')

@section('content')
<h1>Lista filmów</h1>

<section class="grid" aria-label="Lista dostępnych filmów">
@foreach($movies as $movie)
<article aria-labelledby="movie-{{ $movie->id }}">
    <h2 id="movie-{{ $movie->id }}">{{ $movie->title }}</h2>

    <img
        src="{{ $movie->poster_path }}"
        alt="Plakat filmu {{ $movie->title }}"
        loading="lazy"
    >

    <p><strong>Rok:</strong> {{ $movie->release_year }}</p>
    <p>
        <strong>Ocena:</strong>
        {{ $movie->averageRating() ?? 'brak' }}/10
    </p>

    <a href="{{ route('movies.show',$movie) }}"
       aria-label="Przejdź do szczegółów filmu {{ $movie->title }}">
       Szczegóły filmu
    </a>
</article>
@endforeach
</section>

<nav aria-label="Paginacja filmów">
    {{ $movies->links() }}
</nav>
@endsection