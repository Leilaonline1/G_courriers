
@extends('layouts.admin')
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Modifier Type </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Modifier Type</li>
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
    <form method="post" action="{{ route('typeCourriers.update',$typeCourrier->id) }}">
      @method('PUT')
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">

          <div class="form-group">
              <label for="cases"> Libellé :</label>
              <input type="text" class="form-control" name="libelle_t" value="{{ $typeCourrier->libelle_t }}"/>
          </div>
          <div class="form-group">
            <label for="cases"> Courrier Entrant:</label>
            <div class="col-md-6"><select name="id_courrE" id="id_courrE" class="form-control"></div>
              @foreach($courrierEnvs as $courrierEnv)
                  <option value="{{ $courrierEnv->id }}">{{ $courrierEnv->titre }}</option>
              @endforeach
          </select>
        </div>
        <div class="form-group">
            <label for="cases"> Courrier Sortant:</label>
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



