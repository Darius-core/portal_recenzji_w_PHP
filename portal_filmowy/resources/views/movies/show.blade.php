@extends('layout')

@section('title',$movie->title)

@section('content')
<article>
    <div class="row g-4">
        <div class="col-md-4">
            <img
                src="{{ $movie->poster_path }}"
                class="img-fluid rounded shadow"
                alt="Plakat filmu {{ $movie->title }}"
            >
        </div>

        <div class="col-md-8">
            <h1>{{ $movie->title }}</h1>

            <p><strong>Rok:</strong> {{ $movie->release_year }}</p>
            <p><strong>Średnia ocena:</strong>
                ⭐ {{ $movie->averageRating() ?? 'brak' }}/10
            </p>

            <p>{{ $movie->description }}</p>
        </div>
    </div>

    <hr>

    <section aria-labelledby="actors-heading">
        <h2 id="actors-heading">Aktorzy</h2>
        <ul class="list-group list-group-flush">
            @foreach($movie->actors as $actor)
                <li class="list-group-item">
                    <a href="{{ route('actors.show',$actor) }}">
                        {{ $actor->first_name }} {{ $actor->last_name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </section>

    <section aria-labelledby="directors-heading" class="mt-4">
        <h2 id="directors-heading">Reżyserzy</h2>
        <ul class="list-group list-group-flush">
            @foreach($movie->directors as $director)
                <li class="list-group-item">
                    <a href="{{ route('directors.show',$director) }}">
                        {{ $director->first_name }} {{ $director->last_name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </section>

    <section aria-labelledby="reviews-heading" class="mt-4">
        <h2 id="reviews-heading">Recenzje</h2>

        @forelse($movie->reviews as $review)
            <article class="card mb-3">
                <div class="card-body">
                    <p class="mb-1">
                        <strong>{{ $review->user->name }}</strong>
                        ⭐ {{ $review->rating }}/10
                    </p>
                    <p class="mb-0">{{ $review->content }}</p>
                </div>
            </article>
        @empty
            <p>Brak recenzji.</p>
        @endforelse
    </section>

    @auth
        @include('reviews._form', ['movie'=>$movie])
    @else
        <div class="alert alert-info mt-3">
            <a href="{{ route('login') }}">Zaloguj się</a>, aby dodać recenzję.
        </div>
    @endauth
</article>
@endsection