@extends('admin.layout')

@section('content')
<h1>Recenzja filmu: {{ $review->movie->title }}</h1>

<p><strong>Autor:</strong> {{ $review->user->name }}</p>
<p><strong>Ocena:</strong> {{ $review->rating }}/10</p>

<article aria-label="Treść recenzji">
    {{ $review->content }}
</article>

<form method="POST" action="{{ route('admin.reviews.update',$review) }}">
@csrf
@method('PUT')

<label>
<input type="checkbox" name="approved" value="1" {{ $review->approved ? 'checked' : '' }}>
Zatwierdzona
</label>

<button>Zapisz status</button>
</form>
@endsection