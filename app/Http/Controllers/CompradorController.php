<?php namespace Comparahora\Http\Controllers;

use Carbon\Carbon;
use Comparahora\Http\Requests;
use Comparahora\Http\Controllers\Controller;
use Comparahora\Plan;
use Comparahora\VentaPlan;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CompradorController extends Controller {

    public function __construct()
    {
        $this->middleware('comprador');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$idUser = Auth::user()->id;
		$compras = VentaPlan::where('user_id', $idUser)->get();
		return view('comprador.index', compact('compras'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


    public function storeContratoTelcel(Request $request)
    {
        $file = $request->file("contrato");
        $name = "final" . $file->getClientOriginalName();
        $file->move(public_path() . '/contratosFinales/', $name);

        return redirect ('comprador');
    }

}
