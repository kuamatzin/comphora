<?php namespace Comparahora;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nombre', 'apellidos', 'telefono', 'celular', 'numeroTarjeta','email', 'password', 'tipo_usuario', 'codigo_confirmacion'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


	/**
	 * Verify if a user is a comprador
	 * @return boolean
	 */
	public function isComprador()
	{	
		if($this->tipo_usuario == 2)
		{
			return true;
		}

		return false;
	}

	/**
	 * Verify if a user is a Manager
	 * @return boolean
	 */
	public function isManager()
	{	
		if($this->tipo_usuario == 1)
		{
			return true;
		}

		return false;
	}

}
