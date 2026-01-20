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

    <button>Zapisz</button>
</form>
@endsection