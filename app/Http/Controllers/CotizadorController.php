<?php

namespace App\Http\Controllers;

use DB;
use PDF;
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
        return view('admin/cotizador.index', compact('user_avatar'));
    }

    public function edit($id)
    {
        $user_avatar = false;

        $cotizacion = Cotizacione::where('id', $id)->first();
        $cliente = Client::where('id', $cotizacion->client_id)->first();

        //dd($cotizacion);
        return view('admin/cotizador.edit', compact('user_avatar', 'cotizacion', 'cliente'));
    }

    public function busca(Request $request)
    {
        //$result = Product::where('nombre', 'LIKE', "%{$request->input('query')}%")->get();
        $result = DB::select("select id, nombre AS name, precio, imagen, sku from products where nombre LIKE '%{$request->input('query')}%'");
        return response()->json($result);
    }

    public function guarda(Request $request) 
    {
        //dd($request);
        //return;

        $producto = $request->producto;
        foreach ($producto as $key => $value) {
            $can = array();
            $pre = array();
            $sum = array();

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
                'imagen' => $value['imagen'],
                'sku' => $value['sku'],
                'color' => $value['color'],
                'imprenta' => $value['impresion'],
                'cantidad' => $can,
                'precio' => $pre,
                'suma' => $sum
            ];
        }

        //dd($detalle);
        //return;


        $client = Client::where('rut', $request->rut)->first();

        if(!$client){
            $client = Client::create([
                'nombre' => $request->empresa,
                'rut' => $request->rut,
                'contacto' => $request->nombre_cliente,
                'telefono' => 0,
                'email' => $request->email,
                'comentarios' => 'Vía cotizador'
            ]);
        }

        if(isset($request->activa_total)){
            $ac_total = true;
        }else{
            $ac_total = false;
        }

        if(isset($request->activa_descuento)){
            $ac_descuento = true;
        }else{
            $ac_descuento = false;
        }

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
            'activa_total' => $ac_total,
            'activa_descuento' => $ac_descuento
        ];
        $marcaTiempo = time();
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
            //'pdf' => '/cotizacion/cotizacion'.$request->empresa.$marcaTiempo.'.pdf',
            'pdf' => '/cotizacion/Pro-Gift_'.urlencode($request->nombre_cliente).date("Y-m-d").'.pdf',
            'tipo' => $request->tipo
        ]);

        //$view = \View::make('admin/cotizador.pdf',compact('nombre', 'email', 'validez', 'empresa', 'forma_pago', 'entrega', 'descuento', 'neto', 'iva', 'total', 'detalle'));
        
        $view = \View::make('admin/cotizador.pdfinterno',compact('data'));
        $html = $view->render();

        //$pdf = new TCPDF();
        PDF::SetTitle('cotizacion');
        PDF::AddPage();
        PDF::writeHTML($html, true, false, true, false, '');
        PDF::Output(public_path('storage').'/cotizacion/Pro-Gift_'.urlencode($request->nombre_cliente).date("Y-m-d").'.pdf', 'F');

        return back()->with([
            'message'    => 'Cotización editada correctamente, Fue guardada con el mismo ID y puede verificar los datos en la sección Cotizaciones',
            'alert-type' => 'success',
        ]);
        
    }
    public function guardaNueva(Request $request) 
    {
        //dd($request);
        //return;

        $producto = $request->producto;
        foreach ($producto as $key => $value) {
            $can = array();
            $pre = array();
            $sum = array();

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
                'imagen' => $value['imagen'],
                'sku' => $value['sku'],
                'color' => $value['color'],
                'imprenta' => $value['impresion'],
                'cantidad' => $can,
                'precio' => $pre,
                'suma' => $sum
            ];
        }

        //dd($detalle);
        //return;


        $client = Client::where('rut', $request->rut)->first();

        if(!$client){
            $client = Client::create([
                'nombre' => $request->empresa,
                'rut' => $request->rut,
                'contacto' => $request->nombre_cliente,
                'telefono' => 0,
                'email' => $request->email,
                'comentarios' => 'Vía cotizador'
            ]);
        }

        if(isset($request->activa_total)){
            $ac_total = true;
        }else{
            $ac_total = false;
        }

        if(isset($request->activa_descuento)){
            $ac_descuento = true;
        }else{
            $ac_descuento = false;
        }

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
            'activa_total' => $ac_total,
            'activa_descuento' => $ac_descuento
        ];
        $marcaTiempo = time();

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
            //'pdf' => '/cotizacion/cotizacion'.$request->empresa.$marcaTiempo.'.pdf',
            'pdf' => '/cotizacion/Pro-Gift_'.urlencode($request->nombre_cliente).date("Y-m-d").'.pdf',
            'tipo' => $request->tipo
        ]);

        //$view = \View::make('admin/cotizador.pdf',compact('nombre', 'email', 'validez', 'empresa', 'forma_pago', 'entrega', 'descuento', 'neto', 'iva', 'total', 'detalle'));
        
        $view = \View::make('admin/cotizador.pdfinterno',compact('data'));
        $html = $view->render();

        //$pdf = new TCPDF();
        PDF::SetTitle('cotizacion');
        PDF::AddPage();
        PDF::writeHTML($html, true, false, true, false, '');
        PDF::Output(public_path('storage').'/cotizacion/Pro-Gift_'.urlencode($request->nombre_cliente).date("Y-m-d").'.pdf', 'F');

        return back()->with([
            'message'    => 'Cotización creada correctamente, puede verificar los datos en la sección Cotizaciones',
            'alert-type' => 'success',
        ]);
        
    }

    public function guardaEnvia(Request $request) 
    {
        //dd($request);
        //return;

        $producto = $request->producto;
        foreach ($producto as $key => $value) {
            $can = array();
            $pre = array();
            $sum = array();

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
                'imagen' => $value['imagen'],
                'sku' => $value['sku'],
                'color' => $value['color'],
                'imprenta' => $value['impresion'],
                'cantidad' => $can,
                'precio' => $pre,
                'suma' => $sum
            ];
        }

        //dd($detalle);
        //return;


        $client = Client::where('rut', $request->rut)->first();

        if(!$client){
            $client = Client::create([
                'nombre' => $request->empresa,
                'rut' => $request->rut,
                'contacto' => $request->nombre_cliente,
                'telefono' => 0,
                'email' => $request->email,
                'comentarios' => 'Vía cotizador'
            ]);
        }

        if(isset($request->activa_total)){
            $ac_total = true;
        }else{
            $ac_total = false;
        }

        if(isset($request->activa_descuento)){
            $ac_descuento = true;
        }else{
            $ac_descuento = false;
        }

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
            'activa_total' => $ac_total,
            'activa_descuento' => $ac_descuento
        ];
        $marcaTiempo = time();
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
            //'pdf' => '/cotizacion/cotizacion'.$request->empresa.$marcaTiempo.'.pdf',
            'pdf' => '/cotizacion/Pro-Gift_'.urlencode($request->nombre_cliente).date("Y-m-d").'.pdf',
            'tipo' => $request->tipo,
            'estado' => 1
        ]);

        //$view = \View::make('admin/cotizador.pdf',compact('nombre', 'email', 'validez', 'empresa', 'forma_pago', 'entrega', 'descuento', 'neto', 'iva', 'total', 'detalle'));
        
        $view = \View::make('admin/cotizador.pdfinterno',compact('data'));
        $html = $view->render();

        //$pdf = new TCPDF();
        PDF::SetTitle('cotizacion');
        PDF::AddPage();
        PDF::writeHTML($html, true, false, true, false, '');
        PDF::Output(public_path('storage').'/cotizacion/Pro-Gift_'.urlencode($request->nombre_cliente).date("Y-m-d").'.pdf', 'F');

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
        //dd($request->producto);

        $producto = $request->producto;
        foreach ($producto as $key => $value) {
            $can = array();
            $pre = array();
            $sum = array();

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
                'imagen' => $value['imagen'],
                'sku' => $value['sku'],
                'color' => $value['color'],
                'imprenta' => $value['impresion'],
                'cantidad' => $can,
                'precio' => $pre,
                'suma' => $sum
            ];
        }

        //dd($detalle);
        //return;


        $client = Client::where('rut', $request->rut)->first();

        if(!$client){
            $client = Client::create([
                'nombre' => $request->empresa,
                'rut' => $request->rut,
                'contacto' => $request->nombre_cliente,
                'telefono' => 0,
                'email' => $request->email,
                'comentarios' => 'Vía cotizador'
            ]);
        }

        if(isset($request->activa_total)){
            $ac_total = true;
        }else{
            $ac_total = false;
        }

        if(isset($request->activa_descuento)){
            $ac_descuento = true;
        }else{
            $ac_descuento = false;
        }

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
            'activa_total' => $ac_total,
            'activa_descuento' => $ac_descuento
        ];
        $marcaTiempo = time();
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
            //'pdf' => '/cotizacion/cotizacion'.$request->empresa.$marcaTiempo.'.pdf',
            'pdf' => '/cotizacion/Pro-Gift_'.urlencode($request->nombre_cliente).date("Y-m-d").'.pdf',
            'tipo' => $request->tipo,
            'estado' => 1
        ]);

        //$view = \View::make('admin/cotizador.pdf',compact('nombre', 'email', 'validez', 'empresa', 'forma_pago', 'entrega', 'descuento', 'neto', 'iva', 'total', 'detalle'));
        
        $view = \View::make('admin/cotizador.pdfinterno',compact('data'));
        $html = $view->render();

        //$pdf = new TCPDF();
        PDF::SetTitle('cotizacion');
        PDF::AddPage();
        PDF::writeHTML($html, true, false, true, false, '');
        PDF::Output(public_path('storage').'/cotizacion/Pro-Gift_'.urlencode($request->nombre_cliente).date("Y-m-d").'.pdf', 'F');
        
        //Mail::to($request->email)->send(new EnviaCotizacion($data));
        
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
        //dd($request->producto);

        $producto = $request->producto;
        foreach ($producto as $key => $value) {
            $can = array();
            $pre = array();
            $sum = array();

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
                'imagen' => $value['imagen'],
                'sku' => $value['sku'],
                'color' => $value['color'],
                'imprenta' => $value['impresion'],
                'cantidad' => $can,
                'precio' => $pre,
                'suma' => $sum
            ];
        }

        //dd($detalle);
        //return;


        $client = Client::where('rut', $request->rut)->first();

        if(!$client){
            $client = Client::create([
                'nombre' => $request->empresa,
                'rut' => $request->rut,
                'contacto' => $request->nombre_cliente,
                'telefono' => 0,
                'email' => $request->email,
                'comentarios' => 'Vía cotizador'
            ]);
        }

        if(isset($request->activa_total)){
            $ac_total = true;
        }else{
            $ac_total = false;
        }

        if(isset($request->activa_descuento)){
            $ac_descuento = true;
        }else{
            $ac_descuento = false;
        }

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
            'activa_total' => $ac_total,
            'activa_descuento' => $ac_descuento
        ];
        $marcaTiempo = time();
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
            //'pdf' => '/cotizacion/cotizacion'.$request->empresa.$marcaTiempo.'.pdf',
            'pdf' => '/cotizacion/Pro-Gift_'.urlencode($request->nombre_cliente).date("Y-m-d").'.pdf',
            'tipo' => $request->tipo
        ]);

        //$view = \View::make('admin/cotizador.pdf',compact('nombre', 'email', 'validez', 'empresa', 'forma_pago', 'entrega', 'descuento', 'neto', 'iva', 'total', 'detalle'));
        
        $view = \View::make('admin/cotizador.pdfinterno',compact('data'));
        $html = $view->render();

        //$pdf = new TCPDF();
        PDF::SetTitle('cotizacion');
        PDF::AddPage();
        PDF::writeHTML($html, true, false, true, false, '');
        PDF::Output(public_path('storage').'/cotizacion/Pro-Gift_'.urlencode($request->nombre_cliente).date("Y-m-d").'.pdf', 'F');

        $id = $cotizacion->id;
        $user_avatar = false;

        $cotizacion = Cotizacione::where('id', $id)->first();
        $cliente = Client::where('id', $cotizacion->client_id)->first();

        return view('admin/cotizador.edit', compact('user_avatar', 'cotizacion', 'cliente'))->with([
            'message'    => 'Cotización guardada correctamente.',
            'alert-type' => 'success',
        ]);
        /*
        return back()->with([
            'message'    => 'Cotización creada correctamente.',
            'alert-type' => 'success',
        ]);
        */
    }

    public function genera(Request $request){
        //dd($request);

        $producto = $request->producto;
        foreach ($producto as $key => $value) {
            $can = array();
            $pre = array();
            $sum = array();

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
                'imagen' => $value['imagen'],
                'sku' => $value['sku'],
                'color' => $value['color'],
                'imprenta' => $value['impresion'],
                'cantidad' => $can,
                'precio' => $pre,
                'suma' => $sum
            ];
        }

        //dd($detalle);
        //return;


        $client = Client::where('rut', $request->rut)->first();

        if(!$client){
            $client = Client::create([
                'nombre' => $request->empresa,
                'rut' => $request->rut,
                'contacto' => $request->nombre_cliente,
                'telefono' => 0,
                'email' => $request->email,
                'comentarios' => 'Vía cotizador'
            ]);
        }

        if(isset($request->activa_total)){
            $ac_total = true;
        }else{
            $ac_total = false;
        }

        if(isset($request->activa_descuento)){
            $ac_descuento = true;
        }else{
            $ac_descuento = false;
        }

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
            'activa_total' => $ac_total,
            'activa_descuento' => $ac_descuento
        ];
        /*
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
            'user_id' => Auth::user()->id
        ]);
        */

        //$view = \View::make('admin/cotizador.pdf',compact('nombre', 'email', 'validez', 'empresa', 'forma_pago', 'entrega', 'descuento', 'neto', 'iva', 'total', 'detalle'));
        
        $view = \View::make('admin/cotizador.pdfinterno',compact('data'));
        $html = $view->render();

        //$pdf = new TCPDF();
        PDF::SetTitle('cotizacion');
        PDF::AddPage();
        PDF::writeHTML($html, true, false, true, false, '');
        PDF::Output(public_path('storage').'/cotizacion/Pro-Gift_'.urlencode($request->nombre_cliente).date("Y-m-d").'.pdf', 'F');
        PDF::Output(public_path('storage').'/cotizacion/Pro-Gift_'.urlencode($request->nombre_cliente).date("Y-m-d").'.pdf', 'I');
    }

    public function pdf(){
        return view('admin/cotizador.pdf');
    }
}