<?php namespace Comparahora\Http\Requests;

use Comparahora\Http\Requests\Request;

class VentaPlanUsuarioRequest extends Request {

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
			'nombre' => 'required|max:255',
            'apellido_paterno' => 'required|max:255',
            'apellido_materno' => 'required|max:255',
            'email'  => 'required|email|max:255|unique:users',
            'telefono' => 'required',
            'calle' => 'required',
            'numero_exterior' => 'required',
            'numero_interior' => 'required',
            'colonia' => 'required',
            'municipio' => 'required',
            'ciudad' => 'required',
            'estado' => 'required',
            'codigo_postal' => 'required'
		];
	}

}
