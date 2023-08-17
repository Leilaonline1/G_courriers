@extends('layouts.admin')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title"><strong>ID :</strong> {{ $service->id  }}</p>
        </header>
        <div class="card-content">
            <div class="content">
                <p>&nbsp &nbsp &nbsp Libellé de la service : {{ $service->libelle_s }}</p>
        </div>
    </div>
@endsection
