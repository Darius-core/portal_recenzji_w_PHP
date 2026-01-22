@extends('admin.layout')

@section('title', 'Podgląd recenzji - Panel administracyjny')
@section('heading', 'Podgląd recenzji')

@section('content')
<div class="card text-bg-dark p-3 mb-3">
    <p><strong>Film:</strong> {{ $review->movie->title }}</p>
    <p><strong>Autor:</strong> {{ $review->user->name }}</p>
    <p><strong>Ocena:</strong> {{ $review->rating }}/10</p>
    <p><strong>Treść:</strong> {{ $review->content ?? 'Brak treści' }}</p>
</div>

<a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary">↩ Powrót</a>
@endsection