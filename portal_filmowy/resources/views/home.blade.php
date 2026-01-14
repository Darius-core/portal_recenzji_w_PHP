@extends('layout')

@section('title','Strona główna')

@section('content')
<h1>Najlepiej oceniane filmy</h1>

<section class="grid">
@foreach($movies as $movie)
<article tabindex="0">
    <h2>{{ $movie->title }}</h2>
    <p>⭐ {{ number_format($movie->reviews_avg_rating ?? 0,1) }}/10</p>
    <a href="{{ route('movies.show',$movie) }}">Zobacz szczegóły</a>
</article>
@endforeach
</section>
@endsection