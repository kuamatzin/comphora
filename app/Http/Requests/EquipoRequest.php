<?php namespace Comparahora\Http\Requests;

use Comparahora\Http\Requests\Request;

class EquipoRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'nombre'               => 'required|unique:smartphones',
			'nucelos'              => 'required|numeric',
			'bateria_conversacion' => 'required|numeric',
			'bateria_espera'       => 'required|numeric',
			'bateria_capacidad'    => 'required|numeric',
			'slot_sim'             => 'required|numeric'
		];
	}

}
