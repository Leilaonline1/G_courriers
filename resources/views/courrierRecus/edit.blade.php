
@extends('layouts.admin')
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Modifier Courrier</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Modifier Courrier</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- /.content-header -->
<section class="content">
  <div class="container-fluid">
    <form method="post" action="{{ route('courrierRecus.update',$courrierRecu->id) }}">
      @method('PUT')
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
          <div class="form-group">
              <label for="cases">Type du courrier :</label>
              <input type="text" class="form-control" name="type_courr" value="{{ $courrierRecu->type_courr }}"/>
          </div>
          <div class="form-group">
            <label for="cases">Titre:</label>
            <input type="text" class="form-control" required name="titre" value="{{ $courrierRecu->titre }}"/>
        </div>
          <div class="form-group">
              <label for="cases"> Objet:</label>
              <input type="text" class="form-control" name="objet" value="{{ $courrierRecu->objet }}"/>
          </div>
          <div class="form-group">
            <label for="cases"> Source:</label>
            <input type="text" class="form-control" name="source" value="{{ $courrierRecu->source }}"/>
        </div>
          <div class="form-group">
              <label for="cases">Destination:</label>
              <input type="text" class="form-control" name="destination" value="{{ $courrierRecu->destination }}"/>
          </div>
          <div class="form-group">
              <label for="cases"> Date :</label>
              <input type="date" class="form-control" name="date" value="{{ $courrierRecu->date }}"/>
          </div>
          <div class="form-group">
            <label for="cases">Etat:</label>
            <input type="text" class="form-control" name="etat" value="{{ $courrierRecu->etat }}"/>
        </div>
          <div class="form-group">
              <label for="cases"> Piece jointe:</label>
              <div class="col-md-6"><select name="id_piece" id="id_piece" class="form-control"></div>
                @foreach($pieceJointes as $pieceJointe)
                    <option value="{{ $pieceJointe->id }}">{{ $pieceJointe->libelle_pj }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="cases"> Service:</label>
            <div class="col-md-6"><select name="id_service" id="id_service" class="form-control"></div>
              @foreach($services as $service)
                  <option value="{{ $service->id }}">{{ $service->libelle_s }}</option>
              @endforeach
          </select>
        </div>

      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-info" value="Save">
      </div>
    </form>
  </div>
</section>

@endsection



