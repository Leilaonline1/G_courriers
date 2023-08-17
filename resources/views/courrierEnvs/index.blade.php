
@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Liste des Courriers Entrants</h1>
    </div>

    <section class="content">
        <div class="container-fluid">
            <p>
                <a href="{{ route('courrierEnvs.create') }}" class="btn btn-primary"> Ajouter une nouvelle courrier</a>
            </p>
            <table class="table table-bordered table-striped">
                <tr>

                    <th>Type du courrier</th>
                    <th>Objet</th>
                    <th>Destination</th>
                    <th>Source</th>
                    <th>Titre</th>
                    <th>Date</th>
                    <th>Piece jointe</th>
                    <th>Service</th>
                    <th>Action</th>
                </tr>
                @foreach($courrierEnvs as $courrierEnv)
                    <tr>

                        <td>{{ $courrierEnv->type_courr}}</td>
                        <td>{{ $courrierEnv->objet}}</td>
                        <td>{{ $courrierEnv->destination}}</td>
                        <td>{{ $courrierEnv->source}}</td>
                        <td>{{ $courrierEnv->titre }}</td>
                        <td>{{ $courrierEnv->date }}</td>
                        <td>{{ $courrierEnv->pieceJointe->libelle_pj}}</td>
                        <td>{{ $courrierEnv->service->libelle_s }}</td>
                        <td>
                  <a href="{{ route('courrierEnvs.edit',$courrierEnv->id) }}" class="btn btn-info">
                    <i class="fas fa-pen"></i>
                  </a>
                  <a href="{{ route('courrierEnvs.show',$courrierEnv->id) }}" class="btn btn-success">
                    <i class="fas fa-eye"></i>
                  </a>
                  <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                </a>
                <form method="POST" action="{{ route('courrierEnvs.destroy', $courrierEnv->id) }}" onsubmit="return confirm('vous voulez supprimé cette courrier?')">
                    @csrf
                    @method('DELETE')
                
                </form>
                </td>
                    </tr>
                @endforeach
            </table>
            <div class="d-flex">
            {{ $courrierEnvs->links() }}
            </div>
        </div>
      </section>


      @endsection

