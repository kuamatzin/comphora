<?php namespace Comparahora\Http\Controllers;

use Comparahora\Http\Requests;
use Comparahora\Http\Controllers\Controller;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use Comparahora\Plan;
use Comparahora\Http\Requests\CargaMasivaRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Comparahora\Http\Requests\PlanRequest;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller {

    public function __construct()
    {
        $this->middleware('manager', ['except' => 'show']);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$planes = Plan::all();

		return view('planes.index', compact('planes'));
	}

	/**
	 * Display a form to update and insert planes
	 * @return Response 
	 */
	public function cargaMasiva()
	{
		return view('cargamasiva');
	}


	public function costoAgregado()
	{
		return view('costoagregado');
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
		$plan = Plan::find($id);
		$planInfo = $plan->getInfo();
		$planInfo->id = $plan->id;
		$planInfo = json_encode($planInfo, FALSE);
		return $planInfo;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$plan = Plan::find($id);
		$planInfo = $plan->getInfo();

		return view('planes.edit', compact('plan', 'planInfo'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, PlanRequest $request)
	{
		DB::update("UPDATE planes SET t_plan = ROW('$request->nombre', $request->renta, $request->minutos_incluidos, $request->minutos_compania, $request->minutos_indistintos, $request->sms, $request->sms_indistintos, $request->sms_compania, $request->internet, $request->numeros_frecuentes, '$request->conexion_directa', '$request->compania', '$request->controlado') WHERE id=$id");

		return redirect('planes');
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

}
