@extends('admin.layout')

@section('title', 'Akyorzy - Panel administracyjny')
@section('heading', 'Aktorzy')

@section('content')
<a href="{{ route('admin.actors.create') }}" class="btn btn-primary mb-3">➕ Dodaj aktora</a>

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
        @foreach($actors as $actor)
        <tr>
            <td>{{ $actor->id }}</td>
            <td>{{ $actor->first_name }}</td>
            <td>{{ $actor->last_name }}</td>
            <td>{{ $actor->birthday ?? '—' }}</td>
            <td>
                <a href="{{ route('admin.actors.edit', $actor) }}" class="btn btn-sm btn-warning mb-1">✏️ Edytuj</a>
                <form action="{{ route('admin.actors.destroy', $actor) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Usunąć aktora?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger mb-1">🗑 Usuń</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $actors->links('pagination::bootstrap-5') }}
@endsection