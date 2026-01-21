@extends('layout')

@section('title',$movie->title)

@section('content')
<article>
<h1>{{ $movie->title }}</h1>

<p><strong>Rok:</strong> {{ $movie->year }}</p>
<p><strong>Średnia ocena:</strong>
   {{ number_format($movie->reviews_avg_rating ?? 0,1) }}/10</p>

<p>{{ $movie->description }}</p>

<section>
<h2>Aktorzy</h2>
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

<section>
<h2>Reżyserzy</h2>
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

<section>
<h2>Recenzje</h2>

@forelse($movie->reviews as $review)
<article>
    <p><strong>{{ $review->user->name }}</strong>
       ⭐ {{ $review->rating }}/10</p>
    <p>{{ $review->content }}</p>
</article>
@empty
<p>Brak recenzji.</p>
@endforelse
</section>

@auth
@include('reviews._form', ['movie'=>$movie])
@else
<p><a href="{{ route('login') }}">Zaloguj się</a>, aby dodać recenzję.</p>
@endauth
</article>
@endsection