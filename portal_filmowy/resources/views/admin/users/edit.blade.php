@extends('admin.layout')

@section('content')
<h1>Role użytkownika: {{ $user->name }}</h1>

<form method="POST"
      action="{{ route('admin.users.update', $user) }}">
    @csrf @method('PUT')

    @foreach($roles as $role)
        <label>
            <input type="checkbox"
                   name="roles[]"
                   value="{{ $role->id }}"
                   {{ $user->roles->contains($role) ? 'checked' : '' }}>
            {{ ucfirst($role->name) }}
        </label><br>
    @endforeach

    <div class="d-flex gap-2">
            <button class="btn btn-primary">Zapisz zmiany</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                Anuluj
            </a>
        </div>
</form>
@endsection