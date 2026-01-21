@extends('admin.layout')

@section('content')
<h1>Reżyserzy</h1>

<a href="{{ route('admin.directors.create') }}" class="btn btn-primary">
    ➕ Dodaj reżysera
</a>

@if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

<table class="table mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Data urodzenia</th>
            <th>Akcje</th>
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
                    <a href="{{ route('admin.directors.edit', $director) }}" class="btn btn-sm btn-warning">
                        ✏️ Edytuj
                    </a>

                    <form action="{{ route('admin.directors.destroy', $director) }}"
                          method="POST"
                          style="display:inline-block"
                          onsubmit="return confirm('Usunąć reżysera?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">
                            🗑 Usuń
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $directors->links() }}
@endsection