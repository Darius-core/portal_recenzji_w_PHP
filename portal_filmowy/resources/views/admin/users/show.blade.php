@extends('admin.layout')

@section('content')
<h1>Profil użytkownika</h1>

<p><strong>Imię:</strong> {{ $user->name }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>
<p><strong>Role:</strong> {{ $user->roles->pluck('name')->join(', ') }}</p>
<p><strong>Status:</strong> {{ $user->is_active ? 'Aktywny' : 'Zablokowany' }}</p>
@endsection