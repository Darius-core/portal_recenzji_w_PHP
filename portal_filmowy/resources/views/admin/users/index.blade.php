@extends('admin.layout')

@section('content')
<h1>Zarządzanie użytkownikami</h1>

@if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Imię</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Akcje</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                {{ $user->roles->pluck('name')->join(', ') }}
            </td>
            <td>
                {{ $user->is_active ? 'Aktywny' : 'Zablokowany' }}
            </td>
            <td>
                <a href="{{ route('admin.users.show', $user) }}">Podgląd</a>
                <a href="{{ route('admin.users.edit', $user) }}">Role</a>

                <form method="POST"
                      action="{{ route('admin.users.toggle', $user) }}"
                      style="display:inline">
                    @csrf @method('PATCH')
                    <button>
                        {{ $user->is_active ? 'Zablokuj' : 'Odblokuj' }}
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $users->links() }}
@endsection