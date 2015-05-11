<?php namespace Comparahora\Http\Requests;

use Comparahora\Http\Requests\Request;

class VentaPlanRequest extends Request {

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
			'user_id'          => 'required',
			'costoagregado_id' => 'required',
			'contrato' 		   => 'required',
			'observaciones'    => 'required',
			'status'		   => 'required'
		];
	}

}
