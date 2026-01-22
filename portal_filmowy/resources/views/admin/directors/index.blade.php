@extends('admin.layout')

@section('title', 'Reżyserzy - Panel administracyjny')
@section('heading', 'Reżyserzy')

@section('content')
<a href="{{ route('admin.directors.create') }}" class="btn btn-primary mb-3">➕ Dodaj reżysera</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped table-hover" aria-label="Lista reżyserów">
    <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Imię</th>
            <th scope="col">Nazwisko</th>
            <th scope="col">Data urodzenia</th>
            <th scope="col">Akcje</th>
        </tr>
    </thead>
    <tbody>
        @foreach($directors as $director)
        <tr>
            <td>{{ $director->id }}</td>
            <td>{{ $director->first_name }}</td>
            <td>{{ $director->last_name }}</td>
            <td>{{ $director->birthday ?? '—' }}</td>
            <td>
                <a href="{{ route('admin.directors.edit', $director) }}" class="btn btn-sm btn-warning mb-1">✏️ Edytuj</a>
                <form action="{{ route('admin.directors.destroy', $director) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Usunąć reżysera?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger mb-1">🗑 Usuń</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $directors->links('pagination::bootstrap-5') }}
@endsection