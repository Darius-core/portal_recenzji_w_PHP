@extends('layout')

@section('title',$movie->title)

@section('content')
<article aria-labelledby="movie-title">

<h1 id="movie-title">{{ $movie->title }}</h1>

<img
    src="{{ $movie->poster_path }}"
    alt="Plakat filmu {{ $movie->title }}"
>

<p><strong>Rok produkcji:</strong> {{ $movie->release_year }}</p>

<p>
<strong>Średnia ocena:</strong>
{{ $movie->averageRating() ?? 'brak' }}/10
</p>

<section aria-labelledby="movie-description">
<h2 id="movie-description">Opis filmu</h2>
<p>{{ $movie->description }}</p>
</section>

<section aria-labelledby="movie-actors">
<h2 id="movie-actors">Aktorzy</h2>
<ul>
@foreach($movie->actors as $actor)
<li>
<a href="{{ route('actors.show',$actor) }}">
{{ $actor->first_name }} {{ $actor->last_name }}
</a>
</li>
@endforeach
</ul>
</section>

<section aria-labelledby="movie-directors">
<h2 id="movie-directors">Reżyserzy</h2>
<ul>
@foreach($movie->directors as $director)
<li>
<a href="{{ route('directors.show',$director) }}">
{{ $director->first_name }} {{ $director->last_name }}
</a>
</li>
@endforeach
</ul>
</section>

<section aria-labelledby="movie-reviews">
<h2 id="movie-reviews">Recenzje użytkowników</h2>

@forelse($movie->reviews as $review)
<article aria-label="Recenzja użytkownika {{ $review->user->name }}">
    <p>
        <strong>{{ $review->user->name }}</strong>,
        ocena {{ $review->rating }} na 10
    </p>
    <p>{{ $review->content }}</p>
</article>
@empty
<p>Ten film nie ma jeszcze recenzji.</p>
@endforelse
</section>

@auth
@include('reviews._form', ['movie'=>$movie])
@else
<p>
<a href="{{ route('login') }}">Zaloguj się</a>,
aby dodać recenzję.
</p>
@endauth

</article>
@endsection