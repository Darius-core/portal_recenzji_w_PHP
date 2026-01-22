@extends('admin.layout')

@section('title', 'Role użytkownika - Panel administracyjny')
@section('heading', 'Role użytkownika: {{ $user->name }}')

@section('content')
<form method="POST" action="{{ route('admin.users.update', $user) }}">
    @csrf @method('PUT')

    <div class="mb-3">
        @foreach($roles as $role)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}"
                {{ $user->roles->contains($role) ? 'checked' : '' }} id="role-{{ $role->id }}">
            <label class="form-check-label" for="role-{{ $role->id }}">
                {{ ucfirst($role->name) }}
            </label>
        </div>
        @endforeach
    </div>

    <div class="d-flex gap-2">
        <button class="btn btn-primary">Zapisz zmiany</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Anuluj</a>
    </div>
</form>
@endsection