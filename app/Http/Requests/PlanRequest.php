<?php namespace Comparahora\Http\Requests;

use Comparahora\Http\Requests\Request;

class PlanRequest extends Request {

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
			'nombre'              => 'required', 
			'renta'               => 'required', 
			'minutos_incluidos'   => 'required', 
			'minutos_indistintos' => 'required',
			'minutos_compania'	  => 'required', 
			'sms'                 => 'required',
			'sms_compania' 		  => 'required',
			'sms_indistintos'     => 'required',  
			'internet'            => 'required',
			'numeros_frecuentes'  => 'required',
			'compania'            => 'required', 
			'controlado'          => 'required'
		];
	}

}
