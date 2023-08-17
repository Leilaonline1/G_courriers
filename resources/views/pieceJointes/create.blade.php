@extends('layouts.admin')
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Ajouter PieceJointe </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href=" {{ route('pieceJointes.index') }}">PieceJointe</a></li>
          <li class="breadcrumb-item active">Ajouter PieceJointe</li>
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
    <form method="post" action="{{ route('pieceJointes.store') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <div class="form-group">
          <label class="col-md-3">Libellé</label>
          <div class="col-md-6"><input type="text" name="libelle_pj" class="form-control" placeholder="Entrer la libelle"></div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <label for="file">Choose a file:</label>
            <div class="col-md-6"><input type="file" name="lien" class="form-control-file" placeholder="choisir le fichier"></div>
            <div class="clearfix"></div>
          </div>
      </div>
     
      <div class="form-group">
        <input type="submit" class="btn btn-info" value="Save">
      </div>
    </form>
  </div>
</section>

@endsection


