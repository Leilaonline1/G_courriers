@extends('layouts.admin')
@section('content')


<div class="content-header">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Liste des services</h1>
    </div>


    <section class="content">
        <div class="container-fluid">
            <p>
                <a href="{{ route('services.create') }}" class="btn btn-primary">Ajouter une nouvelle service</a>
            </p>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Libellé</th>
                    <th>Action</th>
                </tr>
                @foreach($services as $service)
                    <tr>
                        <td>{{ $service->libelle_s}}</td>

                        <td>
                                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-primary">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="{{ route('services.show', $service->id) }}" class="btn btn-success">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <form method="POST" action="{{ route('services.destroy', $service->id) }}" onsubmit="return confirm('vous voulez supprimé cette service?')">
                                    @csrf
                                    @method('DELETE')
                                
                                </form>
                          
                   </td>
                    </tr>
                @endforeach
            </table>

            <div class="d-flex">
                {!! $services->links() !!}
            </div>
        </div>
      </section>

      @endsection

