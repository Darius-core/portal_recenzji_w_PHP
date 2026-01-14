@extends('admin.layout')

@section('content')
<h1>Aktorzy</h1>

<a href="{{ route('admin.actors.create') }}">➕ Dodaj aktora</a>

<table aria-label="Lista aktorów">
<thead>
<tr>
    <th>Imię</th>
    <th>Nazwisko</th>
    <th>Akcje</th>
</tr>
</thead>
<tbody>
@foreach($actors as $actor)
<tr>
    <td>{{ $actor->first_name }}</td>
    <td>{{ $actor->last_name }}</td>
    <td>
        <a href="{{ route('admin.actors.edit',$actor) }}">Edytuj</a>

        <form method="POST"
              action="{{ route('admin.actors.destroy',$actor) }}"
              style="display:inline">
            @csrf
            @method('DELETE')
            <button aria-label="Usuń aktora {{ $actor->first_name }} {{ $actor->last_name }}">
                Usuń
            </button>
        </form>
    </td>
</tr>
@endforeach
</tbody>
</table>
@endsection