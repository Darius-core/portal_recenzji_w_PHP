@extends('layout')

@section('title','Logowanie')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow">
            <div class="card-body">
                <h1 class="h4 mb-3">Logowanie</h1>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hasło</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button class="btn btn-primary w-100">Zaloguj</button>
                </form>

                <a href="{{ url()->previous() }}" class="d-block mt-3">← Wróć</a>
            </div>
        </div>
    </div>
</div>
@endsection