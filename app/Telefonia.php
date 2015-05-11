<?php namespace Comparahora;

use Illuminate\Database\Eloquent\Model;

class Telefonia extends Model {

	protected $connection = 'pgsql2';

	protected $table = 'telefonia_fija';

	protected $fillable = [
		'nombre',
		'empresa',
		'locales',
		'larga_internacional',
		'larga_nacional',
		'larga_mundial',
		'celular',
		'descripcion',
		'renta_mensual',
		'pago_inicial',
		'icono',
		'doble_play',
		'triple_play',
		'empresarial',
		'status'
	];

}
