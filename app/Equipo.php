<?php namespace Comparahora;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model {

	protected $table = 'smartphones';

	protected $fillable = [
		'nombre',
		'nombre_telcel',
		'nombre_movistar',
		'nombre_iusacell',
		'nombre_nextel',
		'nucelos',
		'velocidad',
		'tipo_procesador',
		'pantalla_resolucion',
		'pantalla_tamano',
		'tipo_pantalla',
		'memoria_interna',
		'memoria_ram',
		'memoria_tarjeta',
		'bateria_conversacion',
		'bateria_espera',
		'bateria_capacidad',
		'bateria_tipo',
		'camara_trasera',
		'camara_frontal',
		'camara_video',
		'bluetooth',
		'gps',
		'usb',
		'wireless',
		'red2g',
		'red3g',
		'red4g',
		'os',
		'version',
		'ancho',
		'alto',
		'grosor',
		'peso',
		'slot_sim',
		'tipo_sim',
		'carac_extras',
		'colores',
		'imagen',
		'marca'
	];

}
