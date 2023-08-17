
@extends('layouts.admin')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title"><strong>ID :</strong> {{ $archiveCourrierRecu->id  }}</p>
        </header>
        <div class="card-content">
            <div class="content">
                <p>&nbsp &nbsp &nbsp Date d'archivage : {{ $archiveCourrierRecu->date_archivage }}</p>
                <p>&nbsp &nbsp &nbsp Courrier Sotants : {{ $archiveCourrierRecu->courrierRecu->titre }}</p>  
            </div>
        </div>
    </div>
@endsection
