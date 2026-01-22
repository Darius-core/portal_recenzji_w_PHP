@extends('layout')

@section('title',$director->first_name.' '.$director->last_name)

@section('content')
<article>
    <h1>{{ $director->first_name }} {{ $director->last_name }}</h1>

    <p><strong>Data urodzin:</strong> {{ $director->birthday }}</p>
    <p>{{ $director->bio }}</p>

    <h2 class="mt-4">Filmy</h2>
    <ul class="list-group">
        @foreach($director->movies as $movie)
            <li class="list-group-item">
                <a href="{{ route('movies.show',$movie) }}">
                    {{ $movie->title }}
                </a>
            </li>
        @endforeach
    </ul>
</article>
@endsection