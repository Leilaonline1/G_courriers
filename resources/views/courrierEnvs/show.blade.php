
@extends('layouts.admin')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title"><strong>ID :</strong> {{ $courrierEnv->id  }}</p>
        </header>
        <div class="card-content">
            <div class="content">
                <p>&nbsp &nbsp &nbsp Type du courrier : {{ $courrierEnv->type_courr }}</p>
                <p>&nbsp &nbsp &nbsp Objet : {{ $courrierEnv->objet }}</p>
                <p>&nbsp &nbsp &nbsp Destination: {{ $courrierEnv->destination }}</p>
                <p>&nbsp &nbsp &nbsp Source: {{ $courrierEnv->source }}</p>
                <p>&nbsp &nbsp &nbsp Titre: {{ $courrierEnv->titre }}</p>
                <p>&nbsp &nbsp &nbsp Date: {{ $courrierEnv->date }}</p>
                <p>&nbsp &nbsp &nbsp Piece jointe : {{ $courrierEnv->pieceJointe->libelle_pj }}</p>
                <p>&nbsp &nbsp &nbsp Service : {{ $courrierEnv->service->libelle_s }}</p>
                
            </div>
        </div>
    </div>
@endsection
