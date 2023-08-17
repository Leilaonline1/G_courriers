
@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Liste des Courriers Entrants Archivés</h1>
    </div>

    <section class="content">
        <div class="container-fluid">
            <p>
                <a href="{{ route('archiveCourrierEnvs.create') }}" class="btn btn-primary"> Ajouter une nouvelle courrier entrant</a>
            </p>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Date d'archivage</th>
                    <th>Courrier Entrant</th>
                    <th>Action</th>
                </tr>
                @foreach($archiveCourrierEnvs as $archiveCourrierEnv)
                    <tr>
                        <td>{{ $archiveCourrierEnv->date_archivage }}</td>
                        <td>{{ $archiveCourrierEnv->courrierEnv->titre}}</td>
                        <td>
                  <a href="{{ route('archiveCourrierEnvs.edit',$archiveCourrierEnv->id) }}" class="btn btn-info">
                    <i class="fas fa-pen"></i>
                  </a>
                  <a href="{{ route('archiveCourrierEnvs.show',$archiveCourrierEnv->id) }}" class="btn btn-success">
                    <i class="fas fa-eye"></i>
                  </a>
                  <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                </a>
                <form method="POST" action="{{ route('archiveCourrierEnvs.destroy', $archiveCourrierEnv->id) }}" onsubmit="return confirm('vous voulez supprimé cette courrier?')">
                    @csrf
                    @method('DELETE')
                
                </form>
                </td>
                    </tr>
                @endforeach
            </table>
            <div class="d-flex">
            {{ $archiveCourrierEnvs->links() }}
            </div>
        </div>
      </section>


      @endsection

