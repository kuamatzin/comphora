@extends('app')
@section ('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Crear Equipo</h1>
        <hr>
        <h3>Crear equipo con URL:</h3>
        {!! Form::open(array('action' => 'EquipoController@storeURL')) !!}
          {!! Form::label('smart_gsm_label', 'URL SmarGSM', array('class' => 'col-sm-2')) !!}
          {!! Form::text('smart_gsm', Input::old('smart_gsm'), ['class' => 'form-control', 'placeholder' => 'URL SmarGSM']) !!}
          <br>
          {!! Form::submit('Crear Equipo', ['class' => 'btn btn-primary pull-right']) !!}
        {!! Form::close() !!}
        <br>
        <br>
        <hr>
        <h3>Crear equipo manualmente:</h3>
        @include('errors')
        <div class="form-group">
        {!! Form::open(['url' => 'equipos']) !!}
          @include('equipos.form', ['submitButtonText' => 'Crear Equipo'])
        {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection