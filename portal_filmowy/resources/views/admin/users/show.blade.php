@extends('admin.layout')

@section('title', 'Profil użytkownika - Panel administracyjny')
@section('heading', 'Profil użytkownika')

@section('content')
<div class="card text-bg-dark p-3 mb-3">
    <p><strong>Imię:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> <a href="mailto:{{ $user->email }}" class="link-light">{{ $user->email }}</a></p>
    <p><strong>Role:</strong> {{ $user->roles->pluck('name')->join(', ') }}</p>
    <p><strong>Status:</strong> {{ $user->is_active ? 'Aktywny' : 'Zablokowany' }}</p>
</div>

<a href="{{ route('admin.users.index') }}" class="btn btn-secondary">↩ Powrót</a>
@endsection