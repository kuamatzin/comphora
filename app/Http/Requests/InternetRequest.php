<?php namespace Comparahora\Http\Requests;

use Comparahora\Http\Requests\Request;

class InternetRequest extends Request {

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
			'nombre'        => 'required',
			'empresa'       => 'required',
			'velocidad'     => 'required',
			'descripcion'   => 'required',
			'renta_mensual' => 'required',
			'pago_inicial'  => 'required'
		];
	}

}
