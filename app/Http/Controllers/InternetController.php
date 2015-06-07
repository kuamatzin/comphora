<?php namespace Comparahora\Http\Controllers;

use Comparahora\Http\Requests;
use Comparahora\Http\Controllers\Controller;
use Comparahora\Internet;

use Illuminate\Http\Request;
use Comparahora\Http\Requests\InternetRequest;

class InternetController extends Controller {

    public function __construct()
    {
        $this->middleware('manager');
    }
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$internets = Internet::all();

		return view('internet.index', compact('internets'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('internet.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(InternetRequest $request)
	{
		Internet::create($request->all());
		return redirect('internet');
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
		$internet = Internet::find($id);
		return view('internet.edit', compact('internet'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, InternetRequest $request)
	{
		$internet = Internet::find($id);
		$internet->update($request->all());

		return redirect('internet');
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
