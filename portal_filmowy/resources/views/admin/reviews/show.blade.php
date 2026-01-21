@extends('admin.layout')

@section('content')
<h1>Podgląd recenzji</h1>

<div class="card">
    <p><strong>Film:</strong> {{ $review->movie->title }}</p>
    <p><strong>Autor:</strong> {{ $review->user->name }}</p>
    <p><strong>Ocena:</strong> {{ $review->rating }}/10</p>
    <p><strong>Treść:</strong></p>
    <p>{{ $review->content }}</p>

    <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary">
        ↩ Powrót
    </a>

    <form method="POST"
          action="{{ route('admin.reviews.destroy', $review) }}"
          style="display:inline-block"
          onsubmit="return confirm('Usunąć recenzję?')">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">
            🗑 Usuń
        </button>
    </form>
</div>
@endsection