@extends('layouts.admin')
@section('content')


<div class="content-header">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Liste des pieces jointes</h1>
    </div>


    <section class="content">
        <div class="container-fluid">
            <p>
                <a href="{{ route('pieceJointes.create') }}" class="btn btn-primary">Ajouter une nouvelle piece jointe</a>
            </p>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Libellé</th>
                    <th>Lien</th>
                    <th>Action</th>
                </tr>
                @foreach($pieceJointes as $pieceJointe)
                    <tr>
                        <td>{{ $pieceJointe->libelle_pj}}</td>
                        <td>{{ $pieceJointe->lien}}</td>
                        <td>
                            
                                <a href="{{ route('pieceJointes.edit', $pieceJointe->id) }}" class="btn btn-primary">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="{{ route('pieceJointes.show', $pieceJointe->id) }}" class="btn btn-success">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <form method="POST" action="{{ route('pieceJointes.destroy', $pieceJointe->id) }}"  onsubmit="return confirm('vous voulez supprimé cette piece jointe?')">
                                    @csrf
                                    @method('DELETE')

                                    
                                </form>
                   </td>
                    </tr>
                @endforeach
            </table>

            <div class="d-flex">
                {!! $pieceJointes->links() !!}
            </div>
        </div>
      </section>

      @endsection

