@extends('app')
@section ('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Editar smartphone: {{$equipo->nombre}}</h2>
        <div class="form-group">
          {!! Form::model($equipo, ['method' => 'PATCH', 'url' => 'equipos/' . $equipo->id]) !!}
              @include('equipos.form', ['submitButtonText' => 'Editar Equipo'])
            {!! Form::close() !!}
        </div>
      </div>
      <div class="col-md-5">
        @include('errors')
      </div>
    </div>
  </div>
@endsection