<?php namespace Comparahora;

use Illuminate\Database\Eloquent\Model;

class Internet extends Model {

	protected $connection = 'pgsql2';

	protected $table = 'internet';

	protected $fillable = [
		'nombre',
		'empresa',
		'velocidad',
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
