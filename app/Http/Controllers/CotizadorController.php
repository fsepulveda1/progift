<?php

namespace App\Http\Controllers;

use App\Color;
use App\Exports\MatchRutExport;
use App\Impresion;
use App\Mail\EnviaCotizacionFinal;
use App\MatchRut;
use Barryvdh\DomPDF\PDF;
use DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Response;
use Mail;
use App\Category;
use App\Product;
use App\Cotizacione;
use App\Client;
use App\Mail\EnviaCotizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CotizadorController extends Controller
{

    public function uploadImage(Request $request) {
        $key = $request->query->get('num');
        $imagen = '';
        if (isset($request->producto[$key]['file_imagen'])) {
            $rules = ['producto.'.$key.'.file_imagen' => 'required|image|max:5000'];
            $messages['producto.'.$key.'.file_imagen.required'] = 'Debes seleccionar una imagen';
            $messages['producto.'.$key.'.file_imagen.image'] = 'Debes seleccionar una imagen';
            $messages['producto.'.$key.'.file_imagen.max'] = 'El tamaño máximo permitido es 5 MB';
            request()->validate($rules,$messages);

            /** @var UploadedFile $new_file */
            $new_file = $request->producto[$key]['file_imagen'];
            $fileNameWithTheExtension = $new_file->getClientOriginalName();
            $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);
            $extension = $new_file->getClientOriginalExtension();
            $newFileName = $fileName . '_' . time() . '.' . $extension;
            $new_file->storeAs('public/images/custom_products_images', $newFileName);
            $imagen = "/storage/images/custom_products_images/".$newFileName;
        }


        return response()->json($imagen);
    }

    public function index() {
        $user_avatar = false;
        $colors = json_encode(Color::orderBy('nombre','asc')->get()->toArray());
        $impresions = json_encode(Impresion::all('nombre')->toArray());
        return view('admin/cotizador.index', compact('user_avatar','colors','impresions'));
    }

    public function changeStatus(Request $request) {
        $cotizacion = Cotizacione::where('id', $request->id)->first();
        if($cotizacion) {
            $cotizacion->estado = $cotizacion->estado ? 0 : 1;
            $cotizacion->save();
        }

        return back()->with('success','Cotización marcada como enviada al cliente');
    }

    public function edit($id) {
        $user_avatar = false;

        $cotizacion = Cotizacione::where('id', $id)->first();
        $cliente = Client::where('id', $cotizacion->client_id)->first();
        $colors = json_encode(Color::orderBy('nombre','asc')->get()->toArray());
        $impresions = json_encode(Impresion::all('nombre')->toArray());

        return view('admin/cotizador.edit', compact('user_avatar', 'cotizacion', 'cliente','colors','impresions'));
    }

    public function busca(Request $request) {
        $result = DB::select("select id, nombre AS name, descripcion_larga as descripcion, precio, imagen, sku from products 
                              where (nombre LIKE '%{$request->input('query')}%' OR sku LIKE '%{$request->input('query')}%')");
        foreach ($result as $key => $rs) {
            $colors = DB::select("select c.nombre from product_color pc inner join colors c on pc.color_id = c.id where pc.product_id = ".$rs->id);
            $colors = array_map(function($item){ return $item->nombre; },$colors);
            $result[$key]->colors = $colors;
        }
        return response()->json($result);
    }

    public function guarda(Request $request) {
        $user_id = Auth::user()->id;
        $this->validateRequest($request);
        $client = $this->createClientIfNotExist($request);
        $data = $this->formatingArrayFromRequest($request,$client,$user_id);
        $this->updatingCotization($data,$request->id);

        return Response::json([
            'message'    => 'Cotización editada correctamente, Fue guardada con el mismo ID y puede verificar los datos en la sección Cotizaciones',
            'alert-type' => 'success',
        ]);

    }
    public function guardaNueva(Request $request) {
        $this->validateRequest($request);
        $user_id = Auth::user()->id;
        $client = $this->createClientIfNotExist($request);
        $data = $this->formatingArrayFromRequest($request,$client,$user_id,0);

        $cotization = $this->savingCotization($data);

        $this->createOrUpdateMatchRut($client);

        return Response::json([
            'message'    => 'Cotización creada correctamente, puede verificar los datos en la sección Cotizaciones',
            'alert-type' => 'success',
            'new_id' => $cotization->id
        ]);
    }

    public function guardaEnvia(Request $request) {
        $this->validateRequest($request);
        $user = Auth::user();
        $client = $this->createClientIfNotExist($request);
        $data = $this->formatingArrayFromRequest($request,$client,$user->id,1);
        $cotization = $this->updatingCotization($data,$request->id);

        $emailData = $this->getEmailData($request,$user);
        $pdfname = 'Pro-Gift_'.urlencode($request->nombre_cliente).date("Y-m-d").'.pdf';
        $pdf = $this->generateOutputFromDB($cotization);


        $from['name'] = $user->name;
        $from['address'] = $user->email;

        $message = new EnviaCotizacionFinal($emailData,$from);
        $message->attachData($pdf, $pdfname);

        Mail::to($request->email)->send($message);

        return Response::json([
            'message'    => 'Cotización editada y enviada correctamente, Fue guardada con el mismo ID y puede verificar los datos en la sección Cotizaciones',
            'alert-type' => 'success',
        ]);

    }

    public function store(Request $request) {
        $this->validateRequest($request);
        $user = Auth::user();
        $client = $this->createClientIfNotExist($request);
        $data = $this->formatingArrayFromRequest($request,$client,$user->id,1);

        if(!empty($request->id)) {
            $cotizacion = $this->updatingCotization($data,$request->id);
        }
        else {
            $cotizacion = $this->savingCotization($data);
        }

        $this->createOrUpdateMatchRut($client);

        $emailData = $this->getEmailData($request,$user);
        $pdf = $this->generateOutputFromDB($cotizacion);
        $pdfname = 'Pro-Gift_'.urlencode($request->nombre_cliente).date("Y-m-d").'.pdf';

        $from['name'] = $user->name;
        $from['address'] = $user->email;

        $message = new EnviaCotizacionFinal($emailData,$from);
        $message->attachData($pdf, $pdfname);

        Mail::to($request->email)->send($message);

        return Response::json([
            'message'    => 'Cotización creada correctamente, Fue enviada al cliente y puede verificar los datos en la sección Cotizaciones',
            'alert-type' => 'success',
            'id' => $cotizacion->id
        ]);

    }

    public function soloStore(Request $request) {
        $this->validateRequest($request);
        $user_id = Auth::user()->id;
        $client = $this->createClientIfNotExist($request);

        if(!empty($request->id)) {
            $data = $this->formatingArrayFromRequest($request,$client,$user_id);
            $this->updatingCotization($data,$request->id);
            $id = $request->id;
        }
        else {
            $data = $this->formatingArrayFromRequest($request,$client,$user_id,0);
            $cotizacion = $this->savingCotization($data);
            $id = $cotizacion->id;
        }

        $this->createOrUpdateMatchRut($client);


        return Response::json([
            'message'    => 'Cotización guardada correctamente.',
            'alert-type' => 'success',
            'id' => $id
        ]);
    }

    public function genera(Request $request) {
        $this->validateRequest($request);

        $user = Auth::user();
        $client = $this->createClientIfNotExist($request);
        $data = $this->formatingArrayFromRequest($request,$client,$user->id);

        return $this->getPDF($data,$client,$user);
    }

    public function generateFromDB(Request $request) {
        $cotizacion = Cotizacione::with('client','user')->where(['id'=>$request->get('id')])->first();

        $data  = [
            'number' => $request->get('id'),
            'detalle' => $cotizacion->detalle,
            'validez' => $cotizacion->validez,
            'forma_pago' => $cotizacion->forma_pago,
            'entrega' => $cotizacion->entrega,
            'descuento' => $cotizacion->descuento,
            'neto' => $cotizacion->neto,
            'iva' => $cotizacion->iva,
            'total' => $cotizacion->total,
            'activa_total'=>$cotizacion->activa_total,
            'activa_descuento'=>$cotizacion->activa_descuento,
        ];

        return $this->getPDF($data,$cotizacion->client,$cotizacion->user);
    }

    public function generateOutputFromDB($cotizacion) {


        $data  = [
            'number' => $cotizacion->id,
            'detalle' => $cotizacion->detalle,
            'validez' => $cotizacion->validez,
            'forma_pago' => $cotizacion->forma_pago,
            'entrega' => $cotizacion->entrega,
            'descuento' => $cotizacion->descuento,
            'neto' => $cotizacion->neto,
            'iva' => $cotizacion->iva,
            'total' => $cotizacion->total,
            'activa_total'=>$cotizacion->activa_total,
            'activa_descuento'=>$cotizacion->activa_descuento,
        ];

        return $this->getPDFOutput($data,$cotizacion->client,$cotizacion->user);
    }

    public function pdf(){
        return view('admin/cotizador.pdf');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    private function createClientIfNotExist(Request $request) {
        $client = Client::where([
            ['nombre', $request->empresa],
            ['rut', $request->rut],
            ['email', $request->email],
            ['contacto', $request->nombre_cliente],
        ])->first();

        if (!$client) {
            $client = Client::create([
                'nombre' => $request->empresa,
                'rut' => $request->rut,
                'contacto' => $request->nombre_cliente,
                'telefono' => '',
                'email' => $request->email,
                'comentarios' => ''
            ]);
            return $client;
        }
        return $client;
    }

    private function createOrUpdateMatchRut($client) {
        $matchRut = MatchRut::updateOrCreate(
            ['rut' => $client->rut],
            ['vendedor' => Auth::user()->email,'estado' => 1, 'procedencia' => 'Web']
        );

        return $matchRut;
    }

    /**
     * @param $data
     * @return mixed
     */
    private function savingCotization($data) {
        $cotizacion = Cotizacione::create($data);

        return $cotizacion;
    }

    /**
     * @param $data
     * @param $id
     */
    private function updatingCotization($data,$id) {
        Cotizacione::where('id', $id)->update($data);
        return Cotizacione::find($id);
    }

    /**
     * @param $data
     * @return \Illuminate\Http\Response
     */
    private function getPDF($data, $client,$user) {
        /** @var PDF $pdf */
        $pdf = app('dompdf.wrapper');
        $pdf = $pdf->loadView('admin/cotizador.pdfinterno', ['data'=>$data,'client'=>$client,'user'=>$user]);
        return $pdf->stream('archivo.pdf');
    }


    private function getPDFOutput($data,$client,$user) {

        /** @var PDF $pdf */
        $pdf = app('dompdf.wrapper');
        $pdf = $pdf->loadView('admin/cotizador.pdfinterno', ['data'=>$data,'client'=>$client,'user'=>$user]);
        return $pdf->output();
    }

    private function formatingArrayFromRequest(Request $request, $client, $user_id, $status = null) {

        $detalle = $this->getProductsArrayFromRequest($request);

        $values = [
            'validez' => $request->validez,
            'forma_pago' => $request->forma_pago,
            'entrega' => $request->plazo,
            'detalle' => json_encode($detalle),
            'descuento' => $request->descuento,
            'neto' => $request->neto,
            'iva' => $request->iva,
            'total' => $request->total,
            'client_id' => $client->id,
            'user_id' => $user_id,
            'tipo' => isset($request->tipo) ? $request->tipo : 'normal',
            'activa_total'=>isset($request->activar_totales),
            'activa_descuento'=>isset($request->activar_descuento),
        ];

        if($status !== null) {
            $values['estado'] = $status;
        }

        return $values;
    }

    /**
     * @param Request $request
     * @return array
     */
    private function getEmailData(Request $request, $user)
    {
        $detalle = $this->getProductsArrayFromRequest($request);

        $data = [
            'nombre' => $request->nombre_cliente,
            'validez' => $request->validez,
            'empresa' => $request->empresa,
            'forma_pago' => $request->forma_pago,
            'email' => $request->email,
            'entrega' => $request->plazo,
            'detalle' => $detalle,
            'descuento' => $request->descuento,
            'neto' => $request->neto,
            'iva' => $request->iva,
            'total' => $request->total,
            'tipo' => isset($request->tipo) ? $request->tipo : 'normal',
            'activa_total' => isset($request->activar_totales),
            'activa_descuento' => isset($request->activar_descuento),
            'vendedor' => $user
        ];

        return $data;
    }

    private function validateRequest(Request $request) {
        $rules = [
            'nombre_cliente'=>'required|max:200',
            'validez'=>'required|max:100',
            'rut'=>'required|cl_rut',
            'empresa'=>'required|max:200',
            'forma_pago'=>'required|max:100',
            'email'=>'required|email|max:100',
            'plazo'=>'required|max:100',
            'descuento'=>'',
            'neto' =>'',
            'iva' =>'',
            'total' =>'',
        ];

        foreach($request->producto as $key=>$product) {
            $rules['producto.'.$key.'.nombre'] = "required|max:250";
            $rules['producto.'.$key.'.descripcion'] = "required|max:2000";
            $rules['producto.'.$key.'.imagen'] = "required";
            $rules['producto.'.$key.'.color'] = "required|max:100";
            $rules['producto.'.$key.'.impresion'] = "required|max:100";
            foreach($product['cantidad'] as $keyQty=>$qty) {
                $rules['producto.'.$key.'.cantidad.'.$keyQty] = "required|min:0|integer";
            }
            foreach($product['precio'] as $keyPrice=>$price) {
                $rules['producto.'.$key.'.precio.'.$keyPrice] = "required|min:0|integer";
            }
            foreach($product['suma'] as $keySum=>$sum) {
                $rules['producto.'.$key.'.suma.'.$keySum] = "required|min:0|integer";
            }
        }

        $messages = [
            "required" => "Debes completar este campo.",
            "producto.*.imagen.required" => "Debes seleccionar una imagen.",
            "min" => "Ingresa un número positivo",
            "max" => "Ingresa hasta :max caracteres",
            "cl_rut" => "El RUT no es válido",
            "email" => "El email no es válido",
        ];

        return $this->validate($request,$rules,$messages);
    }

    /**
     * @param Request $request
     * @return array
     */
    private function getProductsArrayFromRequest(Request $request) {
        $detalle = [];
        $producto = $request->producto;

        foreach ($producto as $key => $value) {
            $can = $pre = $sum = [];

            foreach ($value['cantidad'] as $key => $cantidad) {
                $can[] = $cantidad;
            }
            foreach ($value['precio'] as $key => $precio) {
                $pre[] = $precio;
            }
            foreach ($value['suma'] as $key => $suma) {
                $sum[] = $suma;
            }

            $detalle[] = [
                'nombre' => $value['nombre'],
                'descripcion' => $value['descripcion'],
                'imagen' => $value['imagen'],
                'color' => $value['color'],
                'imprenta' => $value['impresion'],
                'cantidad' => $can,
                'precio' => $pre,
                'suma' => $sum
            ];
        }

        return $detalle;
    }

    public function showComments($client_id) {
        $client = Client::find($client_id);

        return $client->comentarios;
    }
}