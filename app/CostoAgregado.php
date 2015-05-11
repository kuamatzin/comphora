<?php namespace Comparahora;

use Illuminate\Database\Eloquent\Model;

class CostoAgregado extends Model {

	protected $table = 'costo_agregado';

	/**
	 * Obtiene el plan de una venta
	 * @return Object Objeto del modelo Plan
	 */
	public function plan(){
		return $this->belongsTo('Comparahora\Plan', 'id_plan');
	}

	/**
	 * Obtiene el smartphone de una venta
	 * @return Object Objecto del modelo Equipo
	 */
	public function smartphone(){
		return $this->belongsTo('Comparahora\Equipo', 'id_equipo');
	}

	/**
     * Retorna la diferencia de equipo
	 * @param $contrato
	 * @return mixed
	 */
	public function difEquipo($contrato){
		if ($contrato == 12) {
			return $this->{'12_meses'};
		}
		if ($contrato == 18) {
			return $this->{'18_meses'};
		}
		if ($contrato == 24) {
			return $this->{'24_meses'};
		}
		if ($contrato == 36) {
			return $this->{'36_meses'};
		}
	}
}
