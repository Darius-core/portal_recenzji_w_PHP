@extends('admin.layout')

@section('content')
<h1>Recenzje</h1>

@if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

<table aria-label="Lista recenzji">
<thead>
<tr>
    <th>Film</th>
    <th>Autor</th>
    <th>Ocena</th>
    <th>Akcje</th>
</tr>
</thead>
<tbody>
@foreach($reviews as $review)
<tr>
    <td>{{ $review->movie->title }}</td>
    <td>{{ $review->user->name }}</td>
    <td>{{ $review->rating }}/10</td>
    <td>
        <<a href="{{ route('admin.reviews.show', $review) }}" class="btn btn-sm btn-info">
            👁 Podgląd
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
    </td>
</tr>
@endforeach
</tbody>
</table>

{{ $reviews->links() }}
@endsection