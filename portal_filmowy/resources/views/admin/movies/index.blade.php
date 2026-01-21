@extends('admin.layout')

@section('content')
<h1>Filmy</h1>

<a href="{{ route('admin.movies.create') }}" class="btn">➕ Dodaj film</a>

<table aria-label="Lista filmów">
<thead>
<tr>
    <th>Tytuł</th>
    <th>Rok</th>
    <th>Średnia ocena</th>
    <th>Akcje</th>
</tr>
</thead>
<tbody>
@foreach($movies as $movie)
<tr>
    <td>{{ $movie->title }}</td>
    <td>{{ $movie->release_year }}</td>
    <td>{{ number_format($movie->averageRating() ?? 0, 1) }}</td>
    <td>
        <a href="{{ route('admin.movies.edit',$movie) }}">Edytuj</a>

        <form method="POST"
              action="{{ route('admin.movies.destroy',$movie) }}"
              style="display:inline">
            @csrf
            @method('DELETE')
            <button aria-label="Usuń film {{ $movie->title }}">
                Usuń
            </button>
        </form>
    </td>
</tr>
@endforeach
</tbody>
</table>

{{ $movies->links() }}
@endsection
