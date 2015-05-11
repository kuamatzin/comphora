@extends('app')
@section ('content')
  <div class="container">
    <div>
      @include('errors')
    </div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h2>Editar plan de Tv: {{$tv->nombre}}</h2>
        <div class="form-group">
          {!! Form::model($tv, ['method' => 'PATCH', 'url' => 'tv/' . $tv->id]) !!}
              @include('tv.form', ['submitButtonText' => 'Editar tv'])
            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection