{!! Form::label('nombre_label', 'Nombre', array('class' => 'col-sm-12')) !!}
{!! Form::text('nombre', Input::old('nombre'), ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
<br>
{!! Form::label('renta_label', 'Renta', array('class' => 'col-sm-12')) !!}
{!! Form::text('renta', Input::old('renta'), ['class' => 'form-control', 'placeholder' => 'Renta']) !!}
<br>
{!! Form::label('minutos_incluidos_label', 'Minutos Incluidos', array('class' => 'col-sm-12')) !!}
{!! Form::text('minutos_incluidos', Input::old('minutos_incluidos'), ['class' => 'form-control', 'placeholder' => 'Minutos Incluidos']) !!}
<br>
{!! Form::label('minutos_compania_label', 'Minutos Compañía', array('class' => 'col-sm-12')) !!}
{!! Form::text('minutos_compania', Input::old('minutos_compania'), ['class' => 'form-control', 'placeholder' => 'Minutos Compañía']) !!}
<br>
{!! Form::label('minutos_indistintos_label', 'Minutos Indistintos', array('class' => 'col-sm-12')) !!}
{!! Form::text('minutos_indistintos', Input::old('minutos_indistintos'), ['class' => 'form-control', 'placeholder' => 'Minutos Indistintos']) !!}
<br>
{!! Form::label('sms_label', 'SMS', array('class' => 'col-sm-12')) !!}
{!! Form::text('sms', Input::old('sms'), ['class' => 'form-control', 'placeholder' => 'SMS']) !!}
<br>
{!! Form::label('sms_compania_label', 'SMS Compañía', array('class' => 'col-sm-12')) !!}
{!! Form::text('sms_compania', Input::old('sms_compania'), ['class' => 'form-control', 'placeholder' => 'SMS Compañía']) !!}
<br>
{!! Form::label('sms_indistintos_label', 'SMS Indistintos', array('class' => 'col-sm-12')) !!}
{!! Form::text('sms_indistintos', Input::old('sms_indistintos'), ['class' => 'form-control', 'placeholder' => 'SMS Indistintos']) !!}
<br>
{!! Form::label('internet_label', 'Internet', array('class' => 'col-sm-12')) !!}
{!! Form::text('internet', Input::old('internet'), ['class' => 'form-control', 'placeholder' => 'Internet']) !!}
<br>
{!! Form::label('numeros_frecuentes_label', 'Números Frecuentes', array('class' => 'col-sm-12')) !!}
{!! Form::text('numeros_frecuentes', Input::old('numeros_frecuentes'), ['class' => 'form-control', 'placeholder' => 'Números Frecuentes']) !!}
<br>
{!! Form::label('conexion_directa_label', 'Conexión Directa', array('class' => 'col-sm-12')) !!}
{!! Form::text('conexion_directa', Input::old('conexion_directa'), ['class' => 'form-control', 'placeholder' => 'Conexión Directa']) !!}
<br>
{!! Form::label('compania_label', 'Compañia', array('class' => 'col-sm-12')) !!}
{!! Form::text('compania', Input::old('compania'), ['class' => 'form-control', 'placeholder' => 'Compañia']) !!}
<br>
{!! Form::label('controlado_label', 'Controlado', array('class' => 'col-sm-12')) !!}
{!! Form::text('controlado', Input::old('controlado'), ['class' => 'form-control', 'placeholder' => 'Controlado']) !!}
<br>
{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
<br>