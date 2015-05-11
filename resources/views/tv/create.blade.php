@extends('app')
@section ('content')
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <h1>Crear Plan de TV</h1>
        <div class="form-group">
          {!! Form::open(['url' => 'tv']) !!}
            @include('tv.form', ['submitButtonText' => 'Crear Tv'])
          {!! Form::close() !!}
        </div>
      </div>
      <div class="col-md-5">
        @include('errors')
      </div>
    </div>
  </div>
@endsection