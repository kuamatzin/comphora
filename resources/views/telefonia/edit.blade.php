@extends('app')
@section ('content')
  <div class="container">
    <div>
      @include('errors')
    </div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h2>Editar plan de Telefonia: {{$telefonia->nombre}}</h2>
        <div class="form-group">
          {!! Form::model($telefonia, ['method' => 'PATCH', 'url' => 'telefonia/' . $telefonia->id]) !!}
              @include('telefonia.form', ['submitButtonText' => 'Editar telefonia'])
            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection