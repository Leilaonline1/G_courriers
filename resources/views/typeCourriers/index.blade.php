
@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Liste des Courriers Types de courries </h1>
    </div>

    <section class="content">
        <div class="container-fluid">
            <p>
                <a href="{{ route('typeCourriers.create') }}" class="btn btn-primary"> Ajouter une nouveau type </a>
            </p>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Libellé</th>
                    <th>Courrier Entrant</th>
                    <th>Courrier Sortant</th>
                    <th>Action</th>
                </tr>
                @foreach($typeCourriers as $typeCourrier)
                    <tr>
                        <td>{{ $typeCourrier->libelle_t }}</td>
                        <td>{{ $typeCourrier->courrierEnv->titre}}</td>
                        <td>{{ $typeCourrier->courrierRecu->titre}}</td>
                        <td>
                  <a href="{{ route('typeCourriers.edit',$typeCourrier->id) }}" class="btn btn-info">
                    <i class="fas fa-pen"></i>
                  </a>
                  <a href="{{ route('typeCourriers.show',$typeCourrier->id) }}" class="btn btn-success">
                    <i class="fas fa-eye"></i>
                  </a>
                  <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                </a>
                <form method="POST" action="{{ route('typeCourriers.destroy', $typeCourrier->id) }}" onsubmit="return confirm('vous voulez supprimé ce type courrier?')">
                    @csrf
                    @method('DELETE')
                
                </form>
                </td>
                    </tr>
                @endforeach
            </table>
            <div class="d-flex">
            {{ $typeCourriers->links() }}
            </div>
        </div>
      </section>


      @endsection

