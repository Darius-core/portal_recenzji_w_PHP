@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Edytuj reżysera</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.directors.update', $director) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Imię</label>
            <input
                type="text"
                name="first_name"
                class="form-control"
                value="{{ old('first_name', $director->first_name) }}"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Nazwisko</label>
            <input
                type="text"
                name="last_name"
                class="form-control"
                value="{{ old('last_name', $director->last_name) }}"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Biografia</label>
            <textarea
                name="bio"
                class="form-control"
                rows="4"
            >{{ old('bio', $director->bio) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Data urodzenia</label>
            <input
                type="date"
                name="birthday"
                class="form-control"
                value="{{ old('birthday', $director->birthday?->format('Y-m-d')) }}"
            >
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-primary">Zapisz zmiany</button>
            <a href="{{ route('admin.directors.index') }}" class="btn btn-secondary">
                Anuluj
            </a>
        </div>
    </form>
</div>
@endsection