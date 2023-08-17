@extends('layouts.admin')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title"><strong>ID :</strong> {{ $pieceJointe->id  }}</p>
        </header>
        <div class="card-content">
            <div class="content">
                <p>&nbsp &nbsp &nbsp Libellé du piece jointe : {{ $pieceJointe->libelle_pj }}</p>
                <p>&nbsp &nbsp &nbsp Lien : {{ $pieceJointe->lien }}</p>
            </div>
        </div>
    </div>
@endsection
