<div class="row">
	<div class="col-md-4">
		<h3>Nombres</h3>
		{!! Form::label('nombre_label', 'Nombre', array('class' => 'col-sm-12')) !!}
		{!! Form::text('nombre', Input::old('nombre'), ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}

		{!! Form::label('nombre_telcel_label', 'Nombre Telcel', array('class' => 'col-sm-12')) !!}
		{!! Form::text('nombre_telcel', Input::old('nombre_telcel'), ['class' => 'form-control', 'placeholder' => 'Nombre Telcel']) !!}

		{!! Form::label('nombre_movistar_label', 'Nombre Movistar', array('class' => 'col-sm-12')) !!}
		{!! Form::text('nombre_movistar', Input::old('nombre_movistar'), ['class' => 'form-control', 'placeholder' => 'Nombre Movistar']) !!}

		{!! Form::label('nombre_iusacell_label', 'Nombre Iusacell', array('class' => 'col-sm-12')) !!}
		{!! Form::text('nombre_iusacell', Input::old('nombre_iusacell'), ['class' => 'form-control', 'placeholder' => 'Nombre Iusacell']) !!}

		{!! Form::label('nombre_nextel_label', 'Nombre Nextel', array('class' => 'col-sm-12')) !!}
		{!! Form::text('nombre_nextel', Input::old('nombre_nextel'), ['class' => 'form-control', 'placeholder' => 'Nombre Nextel']) !!}
		<hr>
		<h3>Procesador</h3>

		{!! Form::label('nucelos_label', 'Nucleos', array('class' => 'col-sm-12')) !!}
		{!! Form::text('nucelos', Input::old('nucelos'), ['class' => 'form-control', 'placeholder' => 'Nucleos']) !!}

		{!! Form::label('velocidad_label', 'Velocidad', array('class' => 'col-sm-12')) !!}
		{!! Form::text('velocidad', Input::old('velocidad'), ['class' => 'form-control', 'placeholder' => 'Velocidad']) !!}

		{!! Form::label('tipo_procesador_label', 'Tipo de procesador', array('class' => 'col-sm-12')) !!}
		{!! Form::text('tipo_procesador', Input::old('tipo_procesador'), ['class' => 'form-control', 'placeholder' => 'Tipo de procesador']) !!}
		<hr>
		<h3>Pantalla</h3>

		{!! Form::label('pantalla_resolucion_label', 'Resolución de Pantalla', array('class' => 'col-sm-12')) !!}
		{!! Form::text('pantalla_resolucion', Input::old('pantalla_resolucion'), ['class' => 'form-control', 'placeholder' => 'Resolución de Pantalla']) !!}

		{!! Form::label('pantalla_tamano_label', 'Tamaño de Pantalla', array('class' => 'col-sm-12')) !!}
		{!! Form::text('pantalla_tamano', Input::old('pantalla_tamano'), ['class' => 'form-control', 'placeholder' => 'Tamaño de Pantalla']) !!}

		{!! Form::label('tipo_pantalla_label', 'Tipo de Pantalla', array('class' => 'col-sm-12')) !!}
		{!! Form::text('tipo_pantalla', Input::old('tipo_pantalla'), ['class' => 'form-control', 'placeholder' => 'Tipo de Pantalla']) !!}

		<hr>
		<h3>Memoria</h3>

		{!! Form::label('memoria_interna_label', 'Memoria Interna', array('class' => 'col-sm-12')) !!}
		{!! Form::text('memoria_interna', Input::old('memoria_interna'), ['class' => 'form-control', 'placeholder' => 'Memoria Interna']) !!}

		{!! Form::label('memoria_ram_label', 'Memoria Ram', array('class' => 'col-sm-12')) !!}
		{!! Form::text('memoria_ram', Input::old('memoria_ram'), ['class' => 'form-control', 'placeholder' => 'Memoria Ram']) !!}

		{!! Form::label('memoria_tarjeta_label', 'Memoria Tarjeta', array('class' => 'col-sm-12')) !!}
		{!! Form::text('memoria_tarjeta', Input::old('memoria_tarjeta'), ['class' => 'form-control', 'placeholder' => 'Memoria Tarjeta']) !!}
	</div>
	<div class="col-md-4">
		<h3>Batería</h3>

		{!! Form::label('bateria_conversacion_label', 'Tiepo de Conversación', array('class' => 'col-sm-12')) !!}
		{!! Form::text('bateria_conversacion', Input::old('bateria_conversacion'), ['class' => 'form-control', 'placeholder' => 'Tiepo de Conversación']) !!}

		{!! Form::label('bateria_espera_label', 'En espera', array('class' => 'col-sm-12')) !!}
		{!! Form::text('bateria_espera', Input::old('bateria_espera'), ['class' => 'form-control', 'placeholder' => 'En espera']) !!}

		{!! Form::label('bateria_capacidad_label', 'Capacidad', array('class' => 'col-sm-12')) !!}
		{!! Form::text('bateria_capacidad', Input::old('bateria_capacidad'), ['class' => 'form-control', 'placeholder' => 'Capacidad']) !!}

		{!! Form::label('bateria_tipo_label', 'Tipo de Bateria', array('class' => 'col-sm-12')) !!}
		{!! Form::text('bateria_tipo', Input::old('bateria_tipo'), ['class' => 'form-control', 'placeholder' => 'Tipo de Bateria']) !!}
		<hr>
		<h3>Camara</h3>

		{!! Form::label('camara_trasera_label', 'Camara Trasera', array('class' => 'col-sm-12')) !!}
		{!! Form::text('camara_trasera', Input::old('camara_trasera'), ['class' => 'form-control', 'placeholder' => 'Camara Trasera']) !!}

		{!! Form::label('camara_frontal_label', 'Camara Delantera', array('class' => 'col-sm-12')) !!}
		{!! Form::text('camara_frontal', Input::old('camara_frontal'), ['class' => 'form-control', 'placeholder' => 'Camara Delantera']) !!}

		{!! Form::label('camara_video_label', 'Camara de Video', array('class' => 'col-sm-12')) !!}
		{!! Form::text('camara_video', Input::old('camara_video'), ['class' => 'form-control', 'placeholder' => 'Camara de Video']) !!}

		<hr>
		<h3>Conectividad</h3>

		{!! Form::label('bluetooth_label', 'Bluetoth', array('class' => 'col-sm-12')) !!}
		{!! Form::text('bluetooth', Input::old('bluetooth'), ['class' => 'form-control', 'placeholder' => 'Bluetoth']) !!}

		{!! Form::label('gps_label', 'GPS', array('class' => 'col-sm-12')) !!}
		{!! Form::text('gps', Input::old('gps'), ['class' => 'form-control', 'placeholder' => 'GPS']) !!}

		{!! Form::label('usb_label', 'USB', array('class' => 'col-sm-12')) !!}
		{!! Form::text('usb', Input::old('usb'), ['class' => 'form-control', 'placeholder' => 'USB']) !!}

		{!! Form::label('wireless_label', 'Wireless', array('class' => 'col-sm-12')) !!}
		{!! Form::text('wireless', Input::old('wireless'), ['class' => 'form-control', 'placeholder' => 'Wireless']) !!}

		{!! Form::label('2g_label', '2g', array('class' => 'col-sm-12')) !!}
		{!! Form::text('2g', Input::old('2g'), ['class' => 'form-control', 'placeholder' => '2g']) !!}

		{!! Form::label('3g_label', '3g', array('class' => 'col-sm-12')) !!}
		{!! Form::text('3g', Input::old('3g'), ['class' => 'form-control', 'placeholder' => '3g']) !!}

		{!! Form::label('4g_label', '4g', array('class' => 'col-sm-12')) !!}
		{!! Form::text('4g', Input::old('4g'), ['class' => 'form-control', 'placeholder' => '4g']) !!}	
	</div>
	<div class="col-md-4">
		<h3>Sistema Operativo</h3>
		{!! Form::label('os_label', 'OS', array('class' => 'col-sm-12')) !!}
		{!! Form::text('os', Input::old('os'), ['class' => 'form-control', 'placeholder' => 'OS']) !!}

		{!! Form::label('version_label', 'Version', array('class' => 'col-sm-12')) !!}
		{!! Form::text('version', Input::old('version'), ['class' => 'form-control', 'placeholder' => 'Version']) !!}
		<hr>
		<h3>Dimensiones</h3>
		{!! Form::label('ancho_label', 'Ancho', array('class' => 'col-sm-12')) !!}
		{!! Form::text('ancho', Input::old('ancho'), ['class' => 'form-control', 'placeholder' => 'Ancho']) !!}

		{!! Form::label('alto_label', 'Alto', array('class' => 'col-sm-12')) !!}
		{!! Form::text('alto', Input::old('alto'), ['class' => 'form-control', 'placeholder' => 'Alto']) !!}

		{!! Form::label('grosor_label', 'Grosor', array('class' => 'col-sm-12')) !!}
		{!! Form::text('grosor', Input::old('grosor'), ['class' => 'form-control', 'placeholder' => 'Grosor']) !!}

		{!! Form::label('peso_label', 'Peso', array('class' => 'col-sm-12')) !!}
		{!! Form::text('peso', Input::old('peso'), ['class' => 'form-control', 'placeholder' => 'Peso']) !!}
		<h3>Varios</h3>

		{!! Form::label('slot_sim_label', 'Slot Sim', array('class' => 'col-sm-12')) !!}
		{!! Form::text('slot_sim', Input::old('slot_sim'), ['class' => 'form-control', 'placeholder' => 'Slot Sim']) !!}

		{!! Form::label('tipo_sim_label', 'Tipo de Sim', array('class' => 'col-sm-12')) !!}
		{!! Form::text('tipo_sim', Input::old('tipo_sim'), ['class' => 'form-control', 'placeholder' => 'Tipo de Sim']) !!}

		{!! Form::label('carac_extras_label', 'Características Extra', array('class' => 'col-sm-12')) !!}
		{!! Form::text('carac_extras', Input::old('carac_extras'), ['class' => 'form-control', 'placeholder' => 'Características Extra']) !!}

		{!! Form::label('colores_label', 'Colores', array('class' => 'col-sm-12')) !!}
		{!! Form::text('colores', Input::old('colores'), ['class' => 'form-control', 'placeholder' => 'Colores']) !!}

		{!! Form::label('imagen_label', 'Imagen', array('class' => 'col-sm-12')) !!}
		{!! Form::text('imagen', Input::old('imagen'), ['class' => 'form-control', 'placeholder' => 'Imagen']) !!}

		{!! Form::label('marca_label', 'Marca', array('class' => 'col-sm-12')) !!}
		{!! Form::text('marca', Input::old('marca'), ['class' => 'form-control', 'placeholder' => 'Marca']) !!}
	</div>
</div>
<br>
{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary pull-right']) !!}





















