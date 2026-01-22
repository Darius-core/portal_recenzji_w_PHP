@extends('admin.layout')

@section('title', 'Recenzje - Panel administracyjny')
@section('heading', 'Recenzje')

@section('content')
@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<table class="table table-striped table-hover" aria-label="Lista recenzji">
    <thead class="table-dark">
        <tr>
            <th scope="col">Film</th>
            <th scope="col">Autor</th>
            <th scope="col">Ocena</th>
            <th scope="col">Akcje</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reviews as $review)
        <tr>
            <td>{{ $review->movie->title }}</td>
            <td>{{ $review->user->name }}</td>
            <td>{{ $review->rating }}/10</td>
            <td>
                <a href="{{ route('admin.reviews.show', $review) }}" class="btn btn-sm btn-info mb-1">👁 Podgląd</a>

                <form method="POST" action="{{ route('admin.reviews.destroy', $review) }}" class="d-inline"
                      onsubmit="return confirm('Usunąć recenzję?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger mb-1">🗑 Usuń</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $reviews->links('pagination::bootstrap-5') }}
@endsection