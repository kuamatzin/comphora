<?php namespace Comparahora\Http\Controllers;

use Comparahora\Http\Requests;
use Comparahora\Http\Controllers\Controller;
use Comparahora\Equipo;
use Comparahora\Http\Requests\EquipoRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Laracasts\Flash\Flash;

class EquipoController extends Controller {

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
		$equipos = Equipo::all();

		return view ('equipos.index', compact('equipos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('equipos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(EquipoRequest $request)
	{
		Equipo::create($request->all());

		return redirect('equipos');
	}

	/**
	 * Store a new smartphone with a URL from SmartGSM
	 * @return Response
	 */
	public function storeURL(Request $request){

		$file = public_path() . "/equipos/download/file.html";
		$script = public_path() . "/equipos/equipos.pl";

        $this->downloadFile($request->smart_gsm, public_path() . "/equipos/download/file.html");

		exec("perl $script $file", $output);
		$fields = array ('nombre', 'velocidad', 'tipo_procesador', 'pantalla_resolucion', 'pantalla_tamano', 'tipo_pantalla', 'memoria_interna', 'memoria_ram', 'memoria_tarjeta', 'bateria_conversacion', 'bateria_espera', 'bateria_capacidad', 'bateria_tipo', 'camara_trasera', 'camara_frontal', 'camara_video', 'bluetooth', 'gps', 'usb', 'wireless', 'red2g', 'red3g', 'red4g', 'os', 'version', 'ancho', 'alto', 'grosor', 'peso', 'slot_sim', 'tipo_sim', 'carac_extras', 'colores', 'imagen', 'marca');
		$array = array_combine ( $fields, explode (",sep", $output[0]));
		$object_plan = json_decode(json_encode($array), FALSE);

		$equipo_en_DB = Equipo::where('nombre', $array['nombre'])->get();
		if (sizeof($equipo_en_DB) == 0) {
			if($array['velocidad'] == ""){$array['velocidad'] = NULL;}
			if($array['pantalla_tamano'] == ""){$array['pantalla_tamano'] = NULL;}
			if($array['memoria_interna'] == ""){$array['memoria_interna'] = NULL;}
			if($array['memoria_ram'] == ""){$array['memoria_ram'] = NULL;}
			if($array['bateria_conversacion'] == ""){$array['bateria_conversacion'] = NULL;}
			if($array['bateria_espera'] == ""){$array['bateria_espera'] = NULL;}
			if($array['bateria_capacidad'] == ""){$array['bateria_capacidad'] = NULL;}
			if($array['camara_trasera'] == ""){$array['camara_trasera'] = NULL;}
			if($array['ancho'] == ""){$array['ancho'] = NULL;}
			if($array['alto'] == ""){$array['alto'] = NULL;}
			if($array['grosor'] == ""){$array['grosor'] = NULL;}
			if($array['peso'] == ""){$array['peso'] = NULL;}
			if($array['slot_sim'] == ""){$array['slot_sim'] = NULL;}

            $nombre = str_replace("http://cdn1.smart-gsm.com/picture/", "", $array['imagen']);
            $this->downloadFile($array['imagen'], public_path() . "/equipos/img/$nombre");
            $urlLocal = str_replace("http://cdn1.smart-gsm.com/picture/", "equipos/img/", $array['imagen']);
            $array['imagen'] = $urlLocal;

			Equipo::create($array);
			Flash::success('Equipo creado con exito');
			return redirect('smartphones');
		}

		else{
			Flash::warning('El equipo ya existe en la base de datos');
			return redirect('smartphones');
		}
	}

  	/**
  	 * Descargar archivo con CURL
     *
  	 * @param  string $source      
  	 * @param  string $destination 
  	 * @return Response              
  	 */
    public function downloadFile($source, $destination)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $source);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSLVERSION,3);
        $data = curl_exec ($ch);
        $error = curl_error($ch);
        curl_close ($ch);

        $file = fopen($destination, "w+");
        fputs($file, $data);
        fclose($file);
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$smartphone = Equipo::find($id);
		return $smartphone;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$equipo = Equipo::find($id);

		return view('equipos.edit', compact('equipo'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, EquipoRequest $request)
	{
		$equipo = Equipo::find($id);
		$equipo->update($request->all());
		Flash::success('Equipo editado exitosamente');
		return redirect('equipos');
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
