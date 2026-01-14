@extends('admin.layout')

@section('content')
<h1>Reżyserzy</h1>

<a href="{{ route('admin.directors.create') }}">➕ Dodaj reżysera</a>

<table aria-label="Lista reżyserów">
<thead>
<tr>
    <th>Imię</th>
    <th>Nazwisko</th>
    <th>Akcje</th>
</tr>
</thead>
<tbody>
@foreach($directors as $director)
<tr>
    <td>{{ $director->first_name }}</td>
    <td>{{ $director->last_name }}</td>
    <td>
        <a href="{{ route('admin.directors.edit',$director) }}">Edytuj</a>

        <form method="POST"
              action="{{ route('admin.directors.destroy',$director) }}"
              style="display:inline">
            @csrf
            @method('DELETE')
            <button aria-label="Usuń reżysera {{ $director->first_name }} {{ $director->last_name }}">
                Usuń
            </button>
        </form>
    </td>
</tr>
@endforeach
</tbody>
</table>
@endsection