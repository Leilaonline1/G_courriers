
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
          <li class="breadcrumb-item"><a href=" {{ route('archiveCourrierRecus.index') }}">Courriers Archivés</a></li>
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
    <form method="post" action="{{ route('archiveCourrierRecus.store') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
          <div class="form-group">
            <label class="col-md-3"> Date d'archivage </label>
            <div class="col-md-6"><input type="date" class="form-control" name="date_archivage" placeholder="Entrer la date d'archivage"></div>
            <div class="clearfix"></div>
          </div> 

          <div class="form-group">
          <label class="col-md-3"> Courrier Sortant  </label>
            <div class="col-md-6"><select name="id_courrR" id="id_courrR" class="form-control"></div>
                @foreach($courrierRecus as $courrierRecu)
                    <option value="{{ $courrierRecu->id }}">{{ $courrierRecu->titre }}</option>
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


