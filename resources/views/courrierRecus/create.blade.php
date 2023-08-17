
@extends('layouts.admin')
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Ajouter Courrier </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href=" {{ route('courrierRecus.index') }}">Courriers</a></li>
          <li class="breadcrumb-item active">Ajouter Courrier</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@if (session()->has('Add'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('Add') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
    <!-- /.content-header -->
<section class="content">
  <div class="container-fluid">
    <form method="post" action="{{ route('courrierRecus.store') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <div class="form-group">
          <label class="col-md-3">Type du courrier</label>
          <div class="col-md-6"><input type="text" name="type_courr" class="form-control" placeholder="Entrer le type"></div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Titre</label>
            <div class="col-md-6"><input type="text" name="titre" class="form-control" placeholder="Entrer le titre"></div>
            <div class="clearfix"></div>
          </div>
        <div class="form-group">
            <label class="col-md-3">Objet</label>
            <div class="col-md-6"><input type="text" name="objet" class="form-control" placeholder="Entrer l'objet"></div>
            <div class="clearfix"></div>
          </div>
          <div class="form-group">
            <label class="col-md-3">Source</label>
            <div class="col-md-6"><input type="text" name="source" class="form-control" placeholder="Entrer la source"></div>
            <div class="clearfix"></div>
          </div>
          <div class="form-group">
            <label class="col-md-3">Destination</label>
            <div class="col-md-6"><input type="text" name="destination" class="form-control" placeholder="Entrer la destination"></div>
            <div class="clearfix"></div>
          </div>
          <div class="form-group">
            <label class="col-md-3"> Date </label>
            <div class="col-md-6"><input type="date" class="form-control" name="date" placeholder="Entrer la date"></div>
            <div class="clearfix"></div>
          </div> 
          <div class="form-group">
            <label class="col-md-3"> Etat </label>
            <div class="col-md-6"><input type="text" class="form-control" name="etat" placeholder="Entrer l'etat"></div>
            <div class="clearfix"></div>
          </div> 
          <div class="form-group">
          <label class="col-md-3"> Piece Jointe  </label>
            <div class="col-md-6"><select name="id_piece" id="id_piece" class="form-control"></div>
                @foreach($pieceJointes as $pieceJointe)
                    <option value="{{ $pieceJointe->id }}">{{ $pieceJointe->libelle_pj }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label class="col-md-3"> Service  </label>
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


