@extends('layout')

@section('title',$actor->first_name.' '.$actor->last_name)

@section('content')
<article>
    <h1>{{ $actor->first_name }} {{ $actor->last_name }}</h1>

    <p><strong>Data urodzin:</strong> {{ $actor->birthday }}</p>
    <p>{{ $actor->bio }}</p>

    <h2 class="mt-4">Filmy</h2>
    <ul class="list-group">
        @foreach($actor->movies as $movie)
            <li class="list-group-item">
                <a href="{{ route('movies.show',$movie) }}">
                    {{ $movie->title }}
                </a>
            </li>
        @endforeach
    </ul>
</article>
@endsection