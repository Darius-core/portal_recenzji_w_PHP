@extends('layout')

@section('title','Filmy')

@section('content')
<h1 class="mb-4">Lista filmów</h1>

<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($movies as $movie)
        <div class="col">
            <article class="card h-100 shadow-sm">
                <img
                    src="{{ asset('images/' . $movie->poster_path) }}"
                    class="card-img-top"
                    alt="Plakat filmu {{ $movie->title }}"
                >

                <div class="card-body d-flex flex-column">
                    <h2 class="h5 card-title">{{ $movie->title }}</h2>

                    <p class="card-text mb-1">
                        <strong>Rok:</strong> {{ $movie->release_year }}
                    </p>

                    <p class="card-text">
                        ⭐ {{ $movie->averageRating() ?? 'brak' }}/10
                    </p>

                    <a
                        href="{{ route('movies.show',$movie) }}"
                        class="btn btn-primary mt-auto"
                        aria-label="Zobacz szczegóły filmu {{ $movie->title }}"
                    >
                        Szczegóły
                    </a>
                </div>
            </article>
        </div>
    @endforeach
</div>

<div class="mt-4">
    {{ $movies->links('pagination::bootstrap-5') }}
</div>
@endsection