<?php namespace Comparahora\Http\Controllers;

use Comparahora\Http\Requests;
use Comparahora\Http\Controllers\Controller;
use Comparahora\Tv;

use Illuminate\Http\Request;
use Comparahora\Http\Requests\TvRequest;

class TvController extends Controller {

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
		$tvs = Tv::all();

		return view('tv.index', compact('tvs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tv.create');	
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(TvRequest $request)
	{
		Tv::create($request->all());
		return redirect('tv');
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
		$tv = Tv::find($id);
		return view('tv.edit', compact('tv'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, TvRequest $request)
	{
		$tv = Tv::find($id);
		$tv->update($request->all());

		return redirect('tv');
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
