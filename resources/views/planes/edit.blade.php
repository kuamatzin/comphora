@extends('app')
@section ('content')
  <div class="container">
    <div>
      @include('errors')
    </div>
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <h2>Editar plan de telefonía movil: {{$planInfo->nombre}}</h2>
        <div class="form-group">
          {!! Form::model($planInfo, ['method' => 'PATCH', 'url' => 'planes/' . $plan->id]) !!}
              @include('planes.form', ['submitButtonText' => 'Editar plan'])
            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection