<?php namespace Comparahora;

use Illuminate\Database\Eloquent\Model;

class VentaPlan extends Model {

	/**
	 * Tabla que será usada por el modelo
	 * @var string
	 */
	protected $table = 'ventas_planes';

	public function getStatusAttribute($value){
		if ($value == 1) {
			return 'Activo';
		}
	}

	/**
	 * Array de los campos que se pueden llenar
	 * @var Array
	 */
	protected $fillable = [
		'costoagregado_id',
		'user_id',
		'status',
		'contrato',
		'observaciones',
		'contrato_file'
	];

	/**
	 * Obtiene el costo agregado de una venta
	 * @return Object Objecto del modelo CostoAgregado
	 */
	public function costoagregado(){
		return $this->belongsTo('Comparahora\CostoAgregado');
	}

	/**
	 * Una venta pertenece a un usuario
	 * @return Object Objecto del modelo User
	 */
	public function user(){
		return $this->belongsTo('Comparahora\User');
	}

    /**
     * Retorna el contrato concatenado con 'meses'
     * @param $value
     * @return string
     */
	public function getContratoAttribute($value)
	{
		if ($value == 12) {
			return "$value meses";
		}
		if ($value == 18) {
			return "$value meses";
		}
		if ($value == 24) {
			return "$value meses";
		}
		if ($value == 36) {
			return "$value meses";
		}
	}
}
