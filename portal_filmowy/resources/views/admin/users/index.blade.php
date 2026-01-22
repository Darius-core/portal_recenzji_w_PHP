@extends('admin.layout')

@section('title', 'Użytkownicy - Panel administracyjny')
@section('heading', 'Zarządzanie użytkownikami')

@section('content')
@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<table class="table table-striped table-hover" aria-label="Lista użytkowników">
    <thead class="table-dark">
        <tr>
            <th scope="col">Imię</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col">Akcje</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td><a href="mailto:{{ $user->email }}" class="link-">{{ $user->email }}</a></td>
            <td>{{ $user->roles->pluck('name')->join(', ') }}</td>
            <td>{{ $user->is_active ? 'Aktywny' : 'Zablokowany' }}</td>
            <td>
                <a href="{{ route('admin.users.show', $user) }}" class="btn btn-sm btn-info mb-1">Podgląd</a>
                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-warning mb-1">Role</a>

                <form method="POST" action="{{ route('admin.users.toggle', $user) }}" class="d-inline">
                    @csrf @method('PATCH')
                    <button type="submit" class="btn btn-sm btn-outline-danger mb-1">
                        {{ $user->is_active ? 'Zablokuj' : 'Odblokuj' }}
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $users->links('pagination::bootstrap-5') }}
@endsection