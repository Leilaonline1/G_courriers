
@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Liste des Courriers Sortants</h1>
    </div>

    <section class="content">
        <div class="container-fluid">
            <p>
                <a href="{{ route('courrierRecus.create') }}" class="btn btn-primary"> Ajouter une nouvelle courrier</a>
            </p>
            <table class="table table-bordered table-striped">
                <tr>

                    <th>Type du courrier</th>
                    <th>Titre</th>
                    <th>Objet</th>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>Date</th>
                    <th>Etat</th>
                    <th>Piece jointe</th>
                    <th>Service</th>
                    <th>Action</th>
                </tr>
                @foreach($courrierRecus as $courrierRecu)
                    <tr>

                        <td>{{ $courrierRecu->type_courr}}</td>
                        <td>{{ $courrierRecu->titre }}</td>
                        <td>{{ $courrierRecu->objet}}</td>
                        <td>{{ $courrierRecu->source}}</td>
                        <td>{{ $courrierRecu->destination}}</td>
                        <td>{{ $courrierRecu->date }}</td>
                        <td>{{ $courrierRecu->etat }}</td>
                        <td>{{ $courrierRecu->pieceJointe->libelle_pj}}</td>
                        <td>{{ $courrierRecu->service->libelle_s }}</td>
                        <td>
                  <a href="{{ route('courrierRecus.edit',$courrierRecu->id) }}" class="btn btn-info">
                    <i class="fas fa-pen"></i>
                  </a>
                  <a href="{{ route('courrierRecus.show',$courrierRecu->id) }}" class="btn btn-success">
                    <i class="fas fa-eye"></i>
                  </a>
                  <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                </a>
                <form method="POST" action="{{ route('courrierRecus.destroy', $courrierRecu->id) }}" onsubmit="return confirm('vous voulez supprimé cette courrier?')">
                    @csrf
                    @method('DELETE')
                
                </form>
                </td>
                    </tr>
                @endforeach
            </table>
            <div class="d-flex">
            {{ $courrierRecus->links() }}
            </div>
        </div>
      </section>


      @endsection

