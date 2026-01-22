@extends('layout')

@section('title','Rejestracja')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-body">
                <h1 class="h4 mb-3">Rejestracja</h1>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Imię</label>
                        <input name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hasło</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Powtórz hasło</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>

                    <button class="btn btn-success w-100">Zarejestruj</button>
                </form>

                <a href="{{ url()->previous() }}" class="d-block mt-3">← Wróć</a>
            </div>
        </div>
    </div>
</div>
@endsection