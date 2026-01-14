@extends('layout')

@section('title','Filmy')

@section('content')
<h1>Lista filmów</h1>

<section class="grid">
@foreach($movies as $movie)
<article>
    <h2>{{ $movie->title }}</h2>
    <p>Rok: {{ $movie->year }}</p>
    <p>⭐ {{ number_format($movie->reviews_avg_rating ?? 0,1) }}/10</p>

    <a href="{{ route('movies.show',$movie) }}"
       aria-label="Szczegóły filmu {{ $movie->title }}">
       Szczegóły
    </a>
</article>
@endforeach
</section>

{{ $movies->links() }}
@endsection