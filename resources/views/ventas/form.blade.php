{!! Form::label('costoagregado_id_label', 'Costo Agregado', array('class' => 'col-sm-2')) !!}
{!! Form::text('costoagregado_id', Input::old('costoagregado_id'), ['class' => 'form-control', 'placeholder' => 'Costo Agregado']) !!}

{!! Form::label('user_id_label', 'Usuario', array('class' => 'col-sm-2')) !!}
{!! Form::text('user_id', Input::old('user_id'), ['class' => 'form-control', 'placeholder' => 'Usuario']) !!}

{!! Form::label('status_label', 'Status', array('class' => 'col-sm-2')) !!}
{!! Form::text('status', Input::old('status'), ['class' => 'form-control', 'placeholder' => 'Status']) !!}

{!! Form::label('contrato_label', 'Contrato', array('class' => 'col-sm-2')) !!}
{!! Form::text('contrato', Input::old('contrato'), ['class' => 'form-control', 'placeholder' => 'Contrato']) !!}

{!! Form::label('observaciones_label', 'Observaciones', array('class' => 'col-sm-2')) !!}
{!! Form::text('observaciones', Input::old('observaciones'), ['class' => 'form-control', 'placeholder' => 'Observaciones']) !!}
<br>
{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}