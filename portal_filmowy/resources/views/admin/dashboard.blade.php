@extends('admin.layout')

@section('title', 'Dashboard - Panel administracyjny')
@section('heading', 'Panel administratora')

@section('content')
<div class="row">
    <div class="col-md-4 mb-3">
        <div class="card text-bg-dark">
            <div class="card-body">
                <h5 class="card-title">Filmy</h5>
                <p class="card-text">{{ $movies }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card text-bg-dark">
            <div class="card-body">
                <h5 class="card-title">Recenzje</h5>
                <p class="card-text">{{ $reviews }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card text-bg-dark">
            <div class="card-body">
                <h5 class="card-title">Użytkownicy</h5>
                <p class="card-text">{{ $users }}</p>
            </div>
        </div>
    </div>
</div>
@endsection