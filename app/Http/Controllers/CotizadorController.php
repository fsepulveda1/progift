<?php

namespace App\Http\Controllers;

use App\Color;
use App\Impresion;
use Barryvdh\DomPDF\PDF;
use DB;
use Illuminate\Http\UploadedFile;
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
    public function index()
    {
        $user_avatar = false;
        $colors = json_encode(Color::all('nombre')->toArray());
        $impresions = json_encode(Impresion::all('nombre')->toArray());
        return view('admin/cotizador.index', compact('user_avatar','colors','impresions'));
    }

    public function edit($id)
    {
        $user_avatar = false;

        $cotizacion = Cotizacione::where('id', $id)->first();
        $cliente = Client::where('id', $cotizacion->client_id)->first();
        $colors = json_encode(Color::all('nombre')->toArray());
        $impresions = json_encode(Impresion::all('nombre')->toArray());

        return view('admin/cotizador.edit', compact('user_avatar', 'cotizacion', 'cliente','colors','impresions'));
    }

    public function busca(Request $request)
    {
        $result = DB::select("select id, nombre AS name, descripcion_larga as descripcion, precio, imagen, sku from products where nombre LIKE '%{$request->input('query')}%'");
        foreach ($result as $key => $rs) {
            $colors = DB::select("select c.nombre from product_color pc inner join colors c on pc.color_id = c.id where pc.product_id = ".$rs->id);
            $colors = array_map(function($item){ return $item->nombre; },$colors);
            $result[$key]->colors = $colors;
        }
        return response()->json($result);
    }

    public function guarda(Request $request)
    {
        $detalle = $this->getProductsArrayFromRequest($request);

        $client = $this->createClientIfNotExist($request);

        $this->updatingCotization($request, $detalle, $client);

        $data = $this->getEmailData($request, $detalle);

        $view = \View::make('admin/cotizador.pdfinterno',compact('data'));
        $html = $view->render();

        //TODO GENERAR PDF??


        return back()->with([
            'message'    => 'Cotización editada correctamente, Fue guardada con el mismo ID y puede verificar los datos en la sección Cotizaciones',
            'alert-type' => 'success',
        ]);

    }
    public function guardaNueva(Request $request)
    {
        $detalle = $this->getProductsArrayFromRequest($request);

        $client = $this->createClientIfNotExist($request);

        $this->savingCotization($request, $detalle, $client);

        $this->savingPDF($request, $detalle);

        return back()->with([
            'message'    => 'Cotización creada correctamente, puede verificar los datos en la sección Cotizaciones',
            'alert-type' => 'success',
        ]);

    }

    public function guardaEnvia(Request $request)
    {

        $detalle = $this->getProductsArrayFromRequest($request);

        $client = $this->createClientIfNotExist($request);

        $data = $this->getEmailData($request, $detalle);

        $cotizacion = Cotizacione::where('id', $request->id)->update([
            'validez' => $request->validez,
            'forma_pago' => $request->forma_pago,
            'entrega' => $request->plazo,
            'detalle' => json_encode($detalle),
            'descuento' => $request->descuento,
            'neto' => $request->neto,
            'iva' => $request->iva,
            'total' => $request->total,
            'client_id' => $client->id,
            'user_id' => Auth::user()->id,
            'pdf' => '/cotizacion/Pro-Gift_'.urlencode($request->nombre_cliente).date("Y-m-d").'.pdf',
            'tipo' => $request->tipo,
            'estado' => 1
        ]);

        $this->savingPDF($request,$detalle);

        $message = new EnviaCotizacion($data);
        $message->attachData(PDF::Output('Pro-Gift_'.urlencode($request->nombre_cliente).date("Y-m-d").'.pdf', 'S'), 'Pro-Gift_'.urlencode($request->nombre_cliente).date("Y-m-d").'.pdf');
        Mail::to($request->email)->send($message);

        return back()->with([
            'message'    => 'Cotización editada y enviada correctamente, Fue guardada con el mismo ID y puede verificar los datos en la sección Cotizaciones',
            'alert-type' => 'success',
        ]);

    }

    public function store(Request $request)
    {
        $detalle = $this->getProductsArrayFromRequest($request);

        $client = $this->createClientIfNotExist($request);

        $this->savingCotization($request,$detalle, $client);

        $data = $this->getEmailData($request, $detalle);

        $view = \View::make('admin/cotizador.pdfinterno',compact('data'));
        $html = $view->render();

        //TODO GENERAR PDF??

        $message = new EnviaCotizacion($data);
        $message->attachData(PDF::Output('Pro-Gift_'.urlencode($request->nombre_cliente).date("Y-m-d").'.pdf', 'S'), 'Pro-Gift_'.urlencode($request->nombre_cliente).date("Y-m-d").'.pdf');
        Mail::to($request->email)->send($message);

        return back()->with([
            'message'    => 'Cotización creada correctamente, Fue enviada al cliente y puede verificar los datos en la sección Cotizaciones',
            'alert-type' => 'success',
        ]);

    }

    public function soloStore(Request $request)
    {
        $detalle = $this->getProductsArrayFromRequest($request);

        $client = $this->createClientIfNotExist($request);

        $cotizacion = $this->savingCotization($request, $detalle, $client);

        $this->savingPDF($request,$detalle);

        $id = $cotizacion->id;

        return redirect('/admin/cotizador/editar/'.$id);
    }

    public function genera(Request $request){

        $detalle = $this->getProductsArrayFromRequest($request);

        $this->createClientIfNotExist($request);

        return $this->savingPDF($request, $detalle);
    }

    public function pdf(){
        return view('admin/cotizador.pdf');
    }

    /**
     * @param Request $request
     * @return array
     */
    private function getProductsArrayFromRequest(Request $request)
    {
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

            /** @var UploadedFile $new_file */

            if(isset($request->producto[$key]['file_imagen'])) {
                $new_file = $request->producto[$key]['file_imagen'];
                $fileNameWithTheExtension = $new_file->getClientOriginalName();
                $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);
                $extension = $new_file->getClientOriginalExtension();
                $newFileName = $fileName . '_' . time() . '.' . $extension;
                $new_file->storeAs('public/images/custom_products_images', $newFileName);
                $imagen = "/storage/images/custom_products_images/".$newFileName;
            }
            else {
                $imagen = $value['imagen'];
            }

            $detalle[] = [
                'nombre' => $value['nombre'],
                'descripcion' => $value['descripcion'],
                'imagen' => $imagen,
                'sku' => $value['sku'],
                'color' => $value['color'],
                'imprenta' => $value['impresion'],
                'cantidad' => $can,
                'precio' => $pre,
                'suma' => $sum
            ];
        }

        return $detalle;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    private function createClientIfNotExist(Request $request)
    {
        $client = Client::where('rut', $request->rut)->first();

        if (!$client) {
            $client = Client::create([
                'nombre' => $request->empresa,
                'rut' => $request->rut,
                'contacto' => $request->nombre_cliente,
                'telefono' => 0,
                'email' => $request->email,
                'comentarios' => 'Vía cotizador'
            ]);
            return $client;
        }
        return $client;
    }

    /**
     * @param Request $request
     * @param $detalle
     * @param $client
     * @return mixed
     */
    private function savingCotization(Request $request, $detalle, $client)
    {
        $cotizacion = Cotizacione::create([
            'validez' => $request->validez,
            'forma_pago' => $request->forma_pago,
            'entrega' => $request->plazo,
            'detalle' => json_encode($detalle),
            'descuento' => $request->descuento,
            'neto' => $request->neto,
            'iva' => $request->iva,
            'total' => $request->total,
            'client_id' => $client->id,
            'user_id' => Auth::user()->id,
            'pdf' => '/cotizacion/Pro-Gift_' . urlencode($request->nombre_cliente) . date("Y-m-d") . '.pdf',
            'tipo' => 'normal'
        ]);
        return $cotizacion;
    }

    /**
     * @param Request $request
     * @param $detalle
     * @return \Illuminate\Http\Response
     */
    private function savingPDF(Request $request, $detalle)
    {
        $data = $this->getEmailData($request, $detalle);
        /** @var PDF $pdf */
        $pdf = app('dompdf.wrapper');
        $pdf = $pdf->loadView('admin/cotizador.pdfinterno', ['data'=>$data]);
        return $pdf->stream('archivo.pdf');
    }

    /**
     * @param Request $request
     * @param $detalle
     * @param $client
     */
    private function updatingCotization(Request $request, $detalle, $client)
    {
        Cotizacione::where('id', $request->id)->update([
            'validez' => $request->validez,
            'forma_pago' => $request->forma_pago,
            'entrega' => $request->plazo,
            'detalle' => json_encode($detalle),
            'descuento' => $request->descuento,
            'neto' => $request->neto,
            'iva' => $request->iva,
            'total' => $request->total,
            'client_id' => $client->id,
            'user_id' => Auth::user()->id,
            'pdf' => '/cotizacion/Pro-Gift_' . urlencode($request->nombre_cliente) . date("Y-m-d") . '.pdf',
            'tipo' => $request->tipo
        ]);
    }

    /**
     * @param Request $request
     * @param $detalle
     * @return array
     */
    private function getEmailData(Request $request, $detalle)
    {
        $vendedor = Auth::user();

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
            'tipo' => $request->tipo,
            'activa_total' => isset($request->activar_totales),
            'activa_descuento' => isset($request->activar_descuento),
            'vendedor' => $vendedor
        ];

        return $data;
    }
}