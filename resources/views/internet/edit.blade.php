@extends('app')
@section ('content')
  <div class="container">
    <div>
      @include('errors')
    </div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h2>Editar plan de Tv: {{$internet->nombre}}</h2>
        <div class="form-group">
          {!! Form::model($internet, ['method' => 'PATCH', 'url' => 'internet/' . $internet->id]) !!}
              @include('internet.form', ['submitButtonText' => 'Editar internet'])
            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection