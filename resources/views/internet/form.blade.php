{!! Form::label('nombre_label', 'Nombre', array('class' => 'col-sm-2')) !!}
{!! Form::text('nombre', Input::old('nombre'), ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}

{!! Form::label('empresa_label', 'Empresa', array('class' => 'col-sm-2')) !!}
{!! Form::text('empresa', Input::old('empresa'), ['class' => 'form-control', 'placeholder' => 'Empresa']) !!}

{!! Form::label('velocidad_label', 'Velocidad', array('class' => 'col-sm-2')) !!}
{!! Form::text('velocidad', Input::old('velocidad'), ['class' => 'form-control', 'placeholder' => 'Velocidad']) !!}

{!! Form::label('descripcion_label', 'Descripción', array('class' => 'col-sm-2')) !!}
{!! Form::text('descripcion', Input::old('descripcion'), ['class' => 'form-control', 'placeholder' => 'Descripción']) !!}

{!! Form::label('renta_mensual_label', 'Renta Mensual', array('class' => 'col-sm-2')) !!}
{!! Form::text('renta_mensual', Input::old('renta_mensual'), ['class' => 'form-control', 'placeholder' => 'Renta Mensual']) !!}

{!! Form::label('pago_inicial_label', 'Pago Inicial', array('class' => 'col-sm-2')) !!}
{!! Form::text('pago_inicial', Input::old('pago_inicial'), ['class' => 'form-control', 'placeholder' => 'Pago Inicial']) !!}

{!! Form::label('icono_label', 'Icono', array('class' => 'col-sm-2')) !!}
{!! Form::text('icono', Input::old('icono'), ['class' => 'form-control', 'placeholder' => 'Icono']) !!}
<br>
{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary pull-right']) !!}