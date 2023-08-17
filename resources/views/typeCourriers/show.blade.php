
@extends('layouts.admin')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title"><strong>ID :</strong> {{ $typeCourrier->id  }}</p>
        </header>
        <div class="card-content">
            <div class="content">
                <p>&nbsp &nbsp &nbsp Libellé : {{ $typeCourrier->libellé_t }}</p>
                <p>&nbsp &nbsp &nbsp Courrier entrant : {{ $typeCourrier->courrierEnv->titre }}</p>  
                <p>&nbsp &nbsp &nbsp Courrier sortant : {{ $typeCourrier->courrierRecu->titre }}</p> 
            </div>
        </div>
    </div>
@endsection
