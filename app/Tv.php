<?php namespace Comparahora;

use Illuminate\Database\Eloquent\Model;

class Tv extends Model {

	protected $connection = 'pgsql2';

	protected $table = 'tv_paga';

	protected $fillable = [
		'nombre',
		'empresa',
		'canales',
		'canales_SD',
		'canales_HD',
		'descripcion',
		'renta_mensual',
		'pago_inicial',
		'icono',
		'imagen_canales',
		'doble_play',
		'triple_play',
		'empresarial',
		'status'
	];

}
