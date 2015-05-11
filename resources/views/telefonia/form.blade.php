{!! Form::label('nombre_label', 'Nombre', array('class' => 'col-sm-12')) !!}
{!! Form::text('nombre', Input::old('nombre'), ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}	

{!! Form::label('empresa_label', 'Empresa', array('class' => 'col-sm-12')) !!}
{!! Form::text('empresa', Input::old('empresa'), ['class' => 'form-control', 'placeholder' => 'Empresa']) !!}

{!! Form::label('locales_label', 'Locales', array('class' => 'col-sm-2')) !!}
{!! Form::text('locales', Input::old('locales'), ['class' => 'form-control', 'placeholder' => 'Locales']) !!}

{!! Form::label('larga_internacional_label', 'Larga Distancia Internacional', array('class' => 'col-sm-12')) !!}
{!! Form::text('larga_internacional', Input::old('larga_internacional'), ['class' => 'form-control', 'placeholder' => 'Larga Distancia Internacional']) !!}

{!! Form::label('larga_nacional_label', 'Larga Distancia Nacional', array('class' => 'col-sm-12')) !!}
{!! Form::text('larga_nacional', Input::old('larga_nacional'), ['class' => 'form-control', 'placeholder' => 'Larga Distancia Nacional']) !!}

{!! Form::label('larga_mundial_label', 'Larga Distancia Mundial', array('class' => 'col-sm-12')) !!}
{!! Form::text('larga_mundial', Input::old('larga_mundial'), ['class' => 'form-control', 'placeholder' => 'Larga Distancia Mundial']) !!}

{!! Form::label('celular_label', 'Celular', array('class' => 'col-sm-12')) !!}
{!! Form::text('celular', Input::old('celular'), ['class' => 'form-control', 'placeholder' => 'Celular']) !!}

{!! Form::label('descripcion_label', 'Descripcion', array('class' => 'col-sm-12')) !!}
{!! Form::text('descripcion', Input::old('descripcion'), ['class' => 'form-control', 'placeholder' => 'Descripcion']) !!}

{!! Form::label('renta_mensual_label', 'Renta Mensual', array('class' => 'col-sm-12')) !!}
{!! Form::text('renta_mensual', Input::old('renta_mensual'), ['class' => 'form-control', 'placeholder' => 'Renta Mensual']) !!}

{!! Form::label('pago_inicial_label', 'Pago Inicial', array('class' => 'col-sm-12')) !!}
{!! Form::text('pago_inicial', Input::old('pago_inicial'), ['class' => 'form-control', 'placeholder' => 'Pago Inicial']) !!}

{!! Form::label('icono_label', 'Icono', array('class' => 'col-sm-12')) !!}
{!! Form::text('icono', Input::old('icono'), ['class' => 'form-control', 'placeholder' => 'Icono']) !!}

<br>
{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary pull-right']) !!}