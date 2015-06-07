<?php namespace Comparahora\Http\Controllers;

use Comparahora\Http\Requests;
use Comparahora\Http\Controllers\Controller;

use Comparahora\Http\Requests\PasswordRequest;
use Comparahora\User;
use Illuminate\Http\Request;

class RegistrarController extends Controller {

	public function confirmar($codigo_confirmacion)
    {
        $user = User::whereCodigoConfirmacion($codigo_confirmacion)->first();
        if ( ! $user)
        {
            return redirect('auth/login');
        }

        return view('auth.confirm', compact('codigo_confirmacion'));
    }

    public function storeUser(PasswordRequest $request , $codigo_confirmacion)
    {
        $user = User::whereCodigoConfirmacion($codigo_confirmacion)->first();
        $user->confirmado = TRUE;
        $user->password = bcrypt($request->password);
        $user->codigo_confirmacion = '';
        $user->save();

        return redirect('auth/login');
    }

}
