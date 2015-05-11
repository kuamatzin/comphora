{!! Form::label('nombre_label', 'Nombre', array('class' => 'col-sm-2')) !!}
{!! Form::text('nombre', Input::old('nombre'), ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}	

{!! Form::label('empresa_label', 'Empresa', array('class' => 'col-sm-2')) !!}
{!! Form::text('empresa', Input::old('empresa'), ['class' => 'form-control', 'placeholder' => 'Empresa']) !!}

{!! Form::label('canales_label', 'Canales', array('class' => 'col-sm-2')) !!}
{!! Form::text('canales', Input::old('canales'), ['class' => 'form-control', 'placeholder' => 'Canales']) !!}

{!! Form::label('canales_SD_label', 'Canales Sd', array('class' => 'col-sm-2')) !!}
{!! Form::text('canales_SD', Input::old('canales_SD'), ['class' => 'form-control', 'placeholder' => 'Canales Sd']) !!}

{!! Form::label('canales_HD_label', 'Canales HD', array('class' => 'col-sm-2')) !!}
{!! Form::text('canales_HD', Input::old('canales_HD'), ['class' => 'form-control', 'placeholder' => 'Canales HD']) !!}

{!! Form::label('descripcion_label', 'Descripcion', array('class' => 'col-sm-2')) !!}
{!! Form::text('descripcion', Input::old('descripcion'), ['class' => 'form-control', 'placeholder' => 'Descripcion']) !!}

{!! Form::label('renta_mensual_label', 'Renta Mensual', array('class' => 'col-sm-2')) !!}
{!! Form::text('renta_mensual', Input::old('renta_mensual'), ['class' => 'form-control', 'placeholder' => 'Renta Mensual']) !!}

{!! Form::label('pago_inicial_label', 'Pago Inicial', array('class' => 'col-sm-2')) !!}
{!! Form::text('pago_inicial', Input::old('pago_inicial'), ['class' => 'form-control', 'placeholder' => 'Pago Inicial']) !!}

{!! Form::label('icono_label', 'Icono', array('class' => 'col-sm-2')) !!}
{!! Form::text('icono', Input::old('icono'), ['class' => 'form-control', 'placeholder' => 'Icono']) !!}

{!! Form::label('imagen_canales_label', 'Imagen Canales', array('class' => 'col-sm-2')) !!}
{!! Form::text('imagen_canales', Input::old('imagen_canales'), ['class' => 'form-control', 'placeholder' => 'Imagen Canales']) !!}
<br>
{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary pull-right']) !!}