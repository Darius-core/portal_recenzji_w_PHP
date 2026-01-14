@extends('admin.layout')

@section('content')
<h1>Recenzje</h1>

<table aria-label="Lista recenzji">
<thead>
<tr>
    <th>Film</th>
    <th>Autor</th>
    <th>Ocena</th>
    <th>Status</th>
    <th>Akcje</th>
</tr>
</thead>
<tbody>
@foreach($reviews as $review)
<tr>
    <td>{{ $review->movie->title }}</td>
    <td>{{ $review->user->name }}</td>
    <td>{{ $review->rating }}/10</td>
    <td>{{ $review->approved ? '✔️ Aktywna' : '⏳ Oczekuje' }}</td>
    <td>
        <a href="{{ route('admin.reviews.show',$review) }}">Podgląd</a>

        <form method="POST"
              action="{{ route('admin.reviews.destroy',$review) }}"
              style="display:inline">
            @csrf
            @method('DELETE')
            <button aria-label="Usuń recenzję">
                Usuń
            </button>
        </form>
    </td>
</tr>
@endforeach
</tbody>
</table>

{{ $reviews->links() }}
@endsection