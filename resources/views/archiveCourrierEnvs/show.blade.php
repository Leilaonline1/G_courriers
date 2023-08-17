
@extends('layouts.admin')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title"><strong>ID :</strong> {{ $archiveCourrierEnv->id  }}</p>
        </header>
        <div class="card-content">
            <div class="content">
                <p>&nbsp &nbsp &nbsp Date d'archivage : {{ $archiveCourrierEnv->date_archivage }}</p>
                <p>&nbsp &nbsp &nbsp Courrier entrant : {{ $archiveCourrierEnv->courrierEnv->titre }}</p>  
            </div>
        </div>
    </div>
@endsection
