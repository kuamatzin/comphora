<?php namespace Comparahora\Http\Controllers;

use Comparahora\Http\Requests;
use Comparahora\Http\Controllers\Controller;

use Comparahora\User;
use Illuminate\Http\Request;
use Comparahora\VentaPlan;
use Comparahora\CostoAgregado;
use Comparahora\Equipo;
use Comparahora\Plan;
use Comparahora\Http\Requests\VentaPlanRequest;
use Comparahora\Http\Requests\VentaPlanUsuarioRequest;
use Illuminate\Support\Facades\Mail;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Validator;

class VentaPlanController extends Controller
{

    public function __construct()
    {
        $this->middleware('manager', ['except' => ['ventaPlan', 'storePlan', 'descargaContratoTelcel', 'descargaContratoIusacell', 'descargaContratoMovistar', 'storeContrato', 'updateStatus']]);
    }

    /**
     * Manda un email al usuario que solicito un plan y además genera un URL para activar su cuenta
     * @param Venta $venta
     * @param string $meses
     * @param string $email
     * @param string $codigo_confirmacion
     */
    public function sendSailMail($venta, $meses, $email, $codigo_confirmacion)
    {
        $nombre_plan = $venta->plan->getInfo()->nombre;
        $datos = $venta->plan->getInfo()->internet;
        $minutos = $venta->plan->getInfo()->minutos_incluidos;
        $sms = $venta->plan->getInfo()->sms;
        $renta_plan = $venta->plan->getInfo()->renta;
        $costo_agregado = $venta->{$meses . "_meses"};
        $smartphone = $venta->smartphone->nombre;
        $image_smartphone = $venta->smartphone->imagen;
        $data = [
            'nombre_plan' => $nombre_plan,
            'minutos' => $minutos,
            'datos' => $datos,
            'sms' => $sms,
            'renta_plan' => $renta_plan,
            'costo_agregado' => $costo_agregado,
            'smartphone' => $smartphone,
            'image_smartphone' => $image_smartphone,
            'codigo_confirmacion' => $codigo_confirmacion
        ];

        Mail::send('emails.ventaPlan', $data, function ($message) use ($email) {
            $message->to($email)->subject('Has adquirido un plan con Comparahora');
        });
    }

    /**
     * Guarda un nuevo usuario, le agrega un password genérico que después cambiará el usuario cuando activa us cuenta
     * @param array $request
     * @param string $confirmation_code
     * @return User
     */
    public function storeUser($request, $confirmation_code){

        $user = new User;
        $user->nombre = $request->nombre;
        $user->apellido_paterno = $request->apellido_paterno;
        $user->apellido_materno = $request->apellido_materno;
        $user->telefono = $request->telefono;
        $user->celular = $request->telefono;
        $user->email = $request->email;
        $user->calle = $request->calle;
        $user->numero_exterior = $request->numero_exterior;
        $user->numero_interior = $request->numero_interior;
        $user->colonia = $request->colonia;
        $user->municipio = $request->municipio;
        $user->ciudad = $request->ciudad;
        $user->estado = $request->estado;
        $user->codigo_postal = $request->codigo_postal;
        $user->tipo_usuario = 2;
        $user->codigo_confirmacion = $confirmation_code;
        $user->password = bcrypt($confirmation_code);
        $user->save();

        return $user;
    }

    public function descargaContratoTelcel(Request $request)
    {
        $venta = VentaPlan::find($request->invisible);
        $user = $venta->user;
        $pdf = new \fpdi\FPDI();
        $pdf->AddPage();
        //Set the source PDF file
        $pagecount = $pdf->setSourceFile('contrato.pdf');
        //Import the first page of the file
        $tppl = $pdf->importPage(1);
        //Use this page as template
        // use the imported page and place it at point 20,30 with a width of 170 mm
        $pdf->useTemplate($tppl, 0, 0, 0);
        #Print Hello World at the bottom of the page
        //Select Arial italic 8
        $pdf->SetFont('Arial','',8);
        $pdf->SetTextColor(0,0,0);

        $pdf->SetXY(524, 68);
        $pdf->Write(0, utf8_decode($user->apellido_paterno));

        $pdf->SetXY(80, 68);
        $pdf->Write(0, utf8_decode($user->apellido_materno));

        $pdf->SetXY(140, 68);
        $pdf->Write(0, utf8_decode($user->nombre));

        $pdf->SetXY(524, 74);
        $pdf->Write(0, '16/07/91');

        $pdf->SetXY(50, 74);
        $pdf->Write(0, 'CJSKOPKAPOS912');

        $pdf->SetXY(120, 74);
        $pdf->Write(0, "Mexicana");

        $pdf->SetXY(150, 74);
        $pdf->Write(0, $user->email);

        //$pdf->SetXY(125, 80);
        //$pdf->Write(0,$banco);

        //$pdf->SetXY(155, 80);
        //$pdf->Write(0,$tarjeta);

        $pdf->SetXY(100, 276);
        $pdf->Write(0,utf8_decode($user->nombre) ." ". utf8_decode($user->apellido_paterno) ." ". utf8_decode($user->apellido_materno));

        /**
         * Domicilio
         */
        //Calle
        $pdf->SetXY(15, 87);
        $pdf->Write(0, utf8_decode($user->calle));
        //Número Exterior
        $pdf->SetXY(166, 87);
        $pdf->Write(0, utf8_decode($user->numero_exterior));
        //Número Interior
        $pdf->SetXY(186, 87);
        $pdf->Write(0, utf8_decode($user->numero_interior));
        //Colonia
        $pdf->SetXY(18, 93);
        $pdf->Write(0, utf8_decode($user->colonia));
        //Código Postal
        $pdf->SetXY(173, 93);
        $pdf->Write(0, utf8_decode($user->codigo_postal));
        //Entre la calle
        $pdf->SetXY(24, 99);
        $pdf->Write(0, "Oaxaca");
        //Y la calle
        $pdf->SetXY(110, 99);
        $pdf->Write(0, "Centenarios");
        //Ciudad
        $pdf->SetXY(15, 105);
        $pdf->Write(0, utf8_decode($user->ciudad));
        //Estado
        $pdf->SetXY(93, 105);
        $pdf->Write(0, utf8_decode($user->estado));
        //Lada
        $pdf->SetXY(177, 105);
        $pdf->Write(0, $user->telefono);

        /**
         * Domicilio del empleo
         */
        //Calle
        $pdf->SetXY(15, 133);
        $pdf->Write(0, utf8_decode($user->calle));
        //Número Exterior
        $pdf->SetXY(166, 133);
        $pdf->Write(0, utf8_decode($user->numero_exterior));
        //Número Interior
        $pdf->SetXY(186, 133);
        $pdf->Write(0, utf8_decode($user->numero_interior));
        //Colonia
        $pdf->SetXY(18, 139);
        $pdf->Write(0, utf8_decode($user->colonia));
        //Código Postal
        $pdf->SetXY(173, 139);
        $pdf->Write(0, utf8_decode($user->codigo_postal));
        //Entre la calle
        $pdf->SetXY(24, 145);
        $pdf->Write(0, "Oaxaca");
        //Y la calle
        $pdf->SetXY(110, 145);
        $pdf->Write(0, "Centenarios");
        //Ciudad
        $pdf->SetXY(15, 151);
        $pdf->Write(0, utf8_decode($user->ciudad));
        //Estado
        $pdf->SetXY(93, 151);
        $pdf->Write(0, utf8_decode($user->estado));
        //Lada
        $pdf->SetXY(153, 151);
        $pdf->Write(0, utf8_decode($user->telefono));
        //Extension
        $pdf->SetXY(190, 151);
        $pdf->Write(0, "12");

        /**
         * Referencias
         */
        //Nombre
        $pdf->SetXY(32, 197);
        $pdf->Write(0, utf8_decode($request->nombre1));
        //Teléfono
        $pdf->SetXY(182, 197);
        $pdf->Write(0, utf8_decode($request->telefono1));
        //Dirección
        $pdf->SetXY(20, 203);
        $pdf->Write(0, utf8_decode($request->direccion1));
        //Relación
        $pdf->SetXY(107, 203);
        $pdf->Write(0, utf8_decode($request->relacion1));
        //Teléfono oficina
        $pdf->SetXY(182, 203);
        $pdf->Write(0, utf8_decode($request->telefono1));

        //Nombre
        $pdf->SetXY(32, 209);
        $pdf->Write(0, utf8_decode($request->nombre2));
        //Teléfono
        $pdf->SetXY(182, 209);
        $pdf->Write(0, utf8_decode($request->telefono2));
        //Dirección
        $pdf->SetXY(20, 215);
        $pdf->Write(0, utf8_decode($request->direccion2));
        //Relación
        $pdf->SetXY(107, 215);
        $pdf->Write(0, utf8_decode($request->relacion2));
        //Teléfono oficina
        $pdf->SetXY(182, 215);
        $pdf->Write(0, utf8_decode($request->telefono2));

        //Nombre
        $pdf->SetXY(32, 221);
        $pdf->Write(0, utf8_decode($request->nombre3));
        //Teléfono
        $pdf->SetXY(182, 221);
        $pdf->Write(0, utf8_decode($request->telefono3));
        //Dirección
        $pdf->SetXY(20, 227);
        $pdf->Write(0, utf8_decode($request->direccion3));
        //Relación
        $pdf->SetXY(107, 227);
        $pdf->Write(0, utf8_decode($request->relacion3));
        //Teléfono oficina
        $pdf->SetXY(182, 227);
        $pdf->Write(0, utf8_decode($request->telefono3));

        $pdf->Output();
    }


    function descargaContratoIusacell(Request $request)
    {
        $venta = VentaPlan::find($request->invisible);
        $user = $venta->user;

        $mydate=getdate(date("U"));
        $dia=$mydate['mday'];
        $mes=$mydate['mon'];
        $ano=$mydate['year'];
        $fecha=$dia."/".$mes."/".$ano;
        $rfc="PARL910716HSNY";

        $pdf = new \fpdi\FPDI();
        $pdf->AddPage();

        //Set the source PDF file
        $pagecount = $pdf->setSourceFile('Solicitud_IUSACEL.pdf');

        //Import the first page of the file
        $tppl = $pdf->importPage(1);

        //Use this page as template
        // use the imported page and place it at point 20,30 with a width of 170 mm
        //$pdf->useTemplate($tppl, -10, 20, 210);
        $pdf->useTemplate($tppl,0,0,0);
        #Print Hello World at the bottom of the page

        //Select Arial italic 8
        $pdf->SetFont('Arial','',8);
        $pdf->SetTextColor(0,0,0);

        //fisica o moral en iusacell;
        $pdf->SetXY(75, 58);
        $pdf->Write(0, "X");

        $pdf->SetXY(60, 69);
        //$pdf->Write(0, $paterno);
        $pdf->Write(0, utf8_decode($user->apellido_paterno));

        $pdf->SetXY(140, 69);
        //$pdf->Write(0, $materno);
        $pdf->Write(0, utf8_decode($user->apellido_materno));

        $pdf->SetXY(60, 63);
        //$pdf->Write(0, $nombre);
        $pdf->Write(0, utf8_decode($user->nombre));

        $pdf->SetXY(165, 49);
        $pdf->Write(0, $fecha);
        //$pdf->Write(0, utf8_decode($user->apellido_paterno));

        $pdf->SetXY(60, 81);
        $pdf->Write(0, $rfc);

        $pdf->SetXY(60, 88);
        //$pdf->Write(0, $calle);
        $pdf->Write(0, utf8_decode($user->calle));

        $pdf->SetXY(60, 94);
        //$pdf->Write(0, $colonia);
        $pdf->Write(0, utf8_decode($user->colonia));

        $pdf->SetXY(60, 100);
        //$pdf->Write(0, $ciudad);
        $pdf->Write(0, utf8_decode($user->ciudad));

        $pdf->SetXY(60, 106);
        //$pdf->Write(0, $cp);
        $pdf->Write(0, utf8_decode($user->codigo_postal));

        $pdf->SetXY(140, 94);
        //$pdf->Write(0, $municipio);
        $pdf->Write(0, utf8_decode($user->municipio));

        $pdf->SetXY(140, 100);
        //$pdf->Write(0, $estado);
        $pdf->Write(0, utf8_decode($user->estado));

        $pdf->SetXY(140, 106);
        //$pdf->Write(0, $tel);
        $pdf->Write(0, utf8_decode($user->apellido_paterno));

        //iusacell efectivo o transferencia.
        $pdf->SetXY(140, 116);
        $pdf->Write(0, "X");

        //cantidad de linea solicitadas
        $pdf->SetXY(67, 190);
        $pdf->Write(0, "1");

        //iusacell equipo propio
        $pdf->SetXY(93, 195);
        $pdf->Write(0, "X");


        $pdf->SetXY(30, 245);
        $pdf->Write(0, utf8_decode($user->nombre)." ". utf8_decode($user->apellido_paterno)." ". utf8_decode($user->apellido_materno));

        $pdf->Output();
        //$pdf->Output("modified_iusacell_pdf.pdf", "F");

    }

    public function descargaContratoMovistar(Request $request)
    {
        $venta = VentaPlan::find($request->invisible);
        $user = $venta->user;

        $mydate=getdate(date("U"));
        $dia=$mydate['mday'];
        $mes=$mydate['mon'];
        $ano=$mydate['year'];
        $fecha=$dia."/".$mes."/".$ano;
        $rfc="PARL910716HSNY";

        $pdf = new \fpdi\FPDI();
        $pdf->AddPage();

        //Set the source PDF file
        $pagecount = $pdf->setSourceFile('contrato_movistar.pdf');

        //Import the first page of the file
        $tppl = $pdf->importPage(1);

        //Use this page as template
        // use the imported page and place it at point 20,30 with a width of 170 mm
        //$pdf->useTemplate($tppl, -10, 20, 210);
        $pdf->useTemplate($tppl,0,0,0,300);
        #Print Hello World at the bottom of the page

        //Select Arial italic 8
        $pdf->SetFont('Arial','',7);
        $pdf->SetTextColor(0,0,0);

        //REGION Movistar
        $pdf->SetXY(100, 45);
        $pdf->Write(0, "7");

        $pdf->SetXY(111, 44);
        $pdf->Write(0, $dia);

        $pdf->SetXY(117, 44);
        $pdf->Write(0, $mes);

        $pdf->SetXY(124, 44);
        $pdf->Write(0, $ano);


        //fisica o moral en movistar;
        $pdf->SetXY(107, 51);//58
        $pdf->Write(0, "X");
        //forma de pago
        $pdf->SetXY(126, 51);
        $pdf->Write(0, "X");


        $pdf->SetXY(30, 61);
        //$pdf->Write(0,$nombre." ".$paterno." ".$materno);
        $pdf->Write(0,utf8_decode($user->nombre)." ".utf8_decode($user->apellido_paterno)." ".utf8_decode($user->apellido_materno));

        $pdf->SetXY(30, 67);
        //$pdf->Write(0, $calle);
        $pdf->Write(0, utf8_decode($user->calle));

        $pdf->SetXY(20, 73);
        //$pdf->Write(0, $municipio);
        $pdf->Write(0, utf8_decode($user->municipio));

        $pdf->SetXY(60, 73);
        //$pdf->Write(0, $ciudad);
        $pdf->Write(0, utf8_decode($user->ciudad));

        $pdf->SetXY(94, 73);
        //$pdf->Write(0, $estado);
        $pdf->Write(0, utf8_decode($user->estado));

        $pdf->SetXY(140, 67);
        //$pdf->Write(0, $colonia);
        $pdf->Write(0, utf8_decode($user->colonia));

        $pdf->SetXY(11, 82);
        $pdf->Write(0, $dia);

        $pdf->SetXY(19, 82);
        $pdf->Write(0, $mes);

        $pdf->SetXY(27, 82);
        $pdf->Write(0, $ano);


        $pdf->SetXY(60, 80);
        //$pdf->Write(0,$email);
        $pdf->Write(0, $user->email);

        //Codigo postal movistar
        //for($i=0;$i<strlen($cp);$i++){
        $cp=$user->codigo_postal;
        for($i=0;$i<strlen($cp);$i++){

            $pdf->SetXY(115+($i*4.6), 73);
            $pdf->Write(0, $cp[$i]);
        }

        //lada movistar
        $tel = $user->telefono;
        $pdf->SetXY(145, 73);
        $pdf->Write(0, $tel[0].$tel[1].$tel[2]);


        $pdf->SetXY(155, 73);
        $pdf->Write(0, substr($tel, 3));

        $incremento=0;
        $place=118;
        for ($i=0; $i < strlen($rfc); $i++) { 

            if(strcmp($rfc[$i], '1')==0){
                //$place=$place+6;
                $incremento=5;
                $pdf->SetXY($place+$incremento, 83);
                $place=$place+$incremento;
                $incremento=5;
                
            }
            else{

                $pdf->SetXY($place+$incremento, 83);
                $place=$place+$incremento;
                $incremento=4.7;
                //
            }
            
            $pdf->Write(0, $rfc[$i]);
        }

        $pdf->AddPage();

        $tppl = $pdf->importPage(2);

        $pdf->useTemplate($tppl,0,0,0,300);

        $pdf->AddPage();

        $tppl = $pdf->importPage(3);

        $pdf->useTemplate($tppl,0,0,0,300);

        $pdf->Output();
    }

    /**
     * @param $id
     * @param $meses
     * @return \Illuminate\View\View
     */
    public function ventaPlan($id, $meses)
    {
        $infoVenta = CostoAgregado::find($id);
        return view('ventas.venta', compact('infoVenta', 'meses'));
    }

    /**
     * Crea una nueva venta que asigna un plan a un usuario
     *
     * @param VentaPlanUsuarioRequest $request
     * @param int $id
     * @param string $meses
     * @return string
     */
    public function storePlan(VentaPlanUsuarioRequest $request, $id, $meses)
    {
        $confirmation_code = str_random(30);
        $newUser = $this->storeUser($request, $confirmation_code);

        $this->crearContrato($request);

        $venta = new VentaPlan;
        $venta->costoagregado_id = $id;
        $venta->user_id = $newUser->id;
        $venta->status = 1;
        $venta->contrato = $meses;
        $venta->save();
        $cost = CostoAgregado::find($id);
        $this->sendSailMail($cost, $meses, $request->email, $confirmation_code);

        return "Exito";
    }

    public function storeContrato(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'contrato' => 'required | mimes:jpeg,bmp,png,pdf'
        ]);

        if ($validator->fails()) {
            Flash::warning('El contrato es requerido, y debe estar en formato JPEG, BMP, PNG o PDF');
            return redirect('comprador');
        }

        $file = $request->file("contrato");
        $name = time() . '-' . $file->getClientOriginalName();
        $file->move(public_path() . '/contratos/', $name);

        $venta = VentaPlan::find($request->invisible);
        $venta->contrato_file = $name;
        $venta->save();
        Flash::success('Contrato enviado con éxito, pronto tendras tu nuevo plan!');
        return redirect('comprador');
    }
    
    public function updateStatus(Request $request)
    {
        $venta = VentaPlan::find($request->invisible);
        $venta->status = $request->status;
        $venta->save();
        return redirect ('ventas');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $ventas = VentaPlan::all();
        return view('ventas.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('ventas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(VentaPlanRequest $request)
    {
        $user = new User;
        $user->name();
        $user->save();

        $venta = new VentaPlan;
        $venta->user_id = $user->id;
        $venta->save();

        return redirect('ventas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
