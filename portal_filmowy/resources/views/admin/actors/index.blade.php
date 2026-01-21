@extends('admin.layout')

@section('content')
<h1>Aktorzy</h1>

<a href="{{ route('admin.actors.create') }}" class="btn btn-primary">
    ➕ Dodaj aktora
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
        @foreach($actors as $actor)
            <tr>
                <td>{{ $actor->id }}</td>
                <td>{{ $actor->first_name }}</td>
                <td>{{ $actor->last_name }}</td>
                <td>{{ $actor->birthday ?? '—' }}</td>
                <td>
                    <a href="{{ route('admin.actors.edit', $actor) }}" class="btn btn-sm btn-warning">
                        ✏️ Edytuj
                    </a>

                    <form action="{{ route('admin.actors.destroy', $actor) }}"
                          method="POST"
                          style="display:inline-block"
                          onsubmit="return confirm('Usunąć aktora?')">
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

{{ $actors->links() }}
@endsection