
@extends('layouts.admin')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title"><strong>ID :</strong> {{ $courrierRecu->id  }}</p>
        </header>
        <div class="card-content">
            <div class="content">
                <p>&nbsp &nbsp &nbsp Type du courrier : {{ $courrierRecu->type_courr }}</p>
                <p>&nbsp &nbsp &nbsp Titre: {{ $courrierRecu->titre }}</p>
                <p>&nbsp &nbsp &nbsp Objet : {{ $courrierRecu->objet }}</p>
                <p>&nbsp &nbsp &nbsp Source: {{ $courrierRecu->source }}</p>
                <p>&nbsp &nbsp &nbsp Destination: {{ $courrierRecu->destination }}</p>
                <p>&nbsp &nbsp &nbsp Date: {{ $courrierRecu->date }}</p>
                <p>&nbsp &nbsp &nbsp Source: {{ $courrierRecu->etat }}</p>
                <p>&nbsp &nbsp &nbsp Piece jointe : {{ $courrierRecu->pieceJointe->libelle_pj }}</p>
                <p>&nbsp &nbsp &nbsp Service : {{ $courrierRecu->service->libelle_s }}</p>
                
            </div>
        </div>
    </div>
@endsection
