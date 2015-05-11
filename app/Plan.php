<?php namespace Comparahora;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model {

	protected $table = 'planes';

	protected $fillable = [
		'nombre', 
		'renta', 
		'minutos_incluidos', 
		'minutos_compania', 
		'minutos_indistintos', 
		'sms', 
		'sms_indistintos', 
		'sms_compania', 
		'internet', 
		'numeros_frecuentes', 
		'conexion_directa', 
		'compania', 
		'controlado'
	];

	/**
	 * Obtiene la información de un plan en específico
	 * @return object Json del plan
	 */
	public function getInfo(){
		$datos = str_replace('"', '', $this->t_plan);
		$datos = str_replace('(', '', $datos);
		$datos = str_replace(')', '', $datos);
		$fields = array ( 'nombre', 'renta', 'minutos_incluidos', 'minutos_compania', 'minutos_indistintos', 'sms', 'sms_indistintos', 'sms_compania', 'internet', 'numeros_frecuentes', 'conexion_directa', 'compania', 'controlado' );
		$array = array_combine ( $fields, explode ( ",", $datos ) );
		$object_plan = json_decode(json_encode($array), FALSE);
		return $object_plan;
	}

}
