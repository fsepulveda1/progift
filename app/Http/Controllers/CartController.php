<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Cotizacione;
use App\Client;
use App\User;
use App\MatchRut;
use PDF;
use Mail;
use DB;
use App\Mail\EnviaCotizacion;
use App\Mail\EnviaCotizacionCliente;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function shop()
    {
        $products = Product::all()->where('destacado', 1);
        $categories = Category::orderBy('orden', 'ASC')->get();
        return view('public.index')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products])->with(['categories' => $categories]);
    }

    public function catList()
    {
        $categories = Category::all();
        return view('partials.cat-menu')->with(['categories' => $categories]);
    }

    public function cart()  {
        $cartCollection = \Cart::getContent();
        $categories = Category::orderBy('orden', 'ASC')->get();
        //dd($cartCollection);
        return view('public.mi-cotizacion.index')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection, 'categories' => $categories]);;
    }

    public function add(Request $request){
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
                'color' => $request->color,
                'impresion' => $request->impresion,
                'slug' => $request->slug
            )
        ));
        return redirect()->route('public.mi-cotizacion.index')->with('success_msg', $request->name.' agregado al carro');
    }

    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('public.mi-cotizacion.index')->with('success_msg', 'Articulo eliminado del carro');
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('public.mi-cotizacion.index')->with('success_msg', 'Carro actualizado');
    }

    public function clear(){
        \Cart::clear();
        return redirect()->route('public.mi-cotizacion.index')->with('success_msg', 'Carro vacio.');
    }

    public function cotiza(Request $request){
        $cartCollection = \Cart::getContent();
        $IVA = \Cart::getTotalQuantity() * 0.19;
        $neto = \Cart::getTotalQuantity() - $IVA;
        //dd($cartCollection);

        foreach ($cartCollection as $item) {
            $detalle[] = [
                'nombre' => $item->name,
                'color' => 'default',
                'imagen' => $item->image,
                'sku' => '0',
                'imprenta' => 'default',
                'cantidad' => $item->quantity,
                'precio' => $item->price,
                'iva' => $item->price*0.19,
                'suma' => $item->price*0.19
            ];
        }

        $client = Client::where('rut', $request->rut)->first();

        if(!$client){
            $client = Client::create([
                'nombre' => $request->empresa,
                'rut' => $request->rut,
                'contacto' => $request->contacto,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'comentarios' => $request->comentarios
            ]);
        }

        $data = [
            'nombre' => $request->contacto,
            'validez' => 10,
            'empresa' => $request->empresa,
            'forma_pago' => '.',
            'email' => $request->email,
            'entrega' => 'web',
            'detalle' => $detalle,
            'descuento' => 0,
            'neto' => $neto,
            'iva' => $IVA,
            'total' => 0,
            'tipo' => 'Web',
            'activa_total' => true,
            'activa_descuento' => true,
            'cliente' => [
                'nombre' => $request->empresa,
                'rut' => $request->rut,
                'contacto' => $request->contacto,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'comentarios' => $request->comentarios
            ]
        ];

        //dd($data);

        $marcaTiempo = time();

        $emailVendedor = $this->matchRut($request->rut);
        $idUser = $this->getIdUser($emailVendedor);
        
        $cotizacion = Cotizacione::create([
            'forma_pago' => 'web',
            'entrega' => 10,
            'detalle' => json_encode($detalle),
            'descuento' => 0,
            'neto' => $neto,
            'iva' => $IVA,
            'total' => \Cart::getTotalQuantity(),
            'client_id' => $client->id,
            'pdf' => '/cotizacion/cotizacion'.$request->empresa.$marcaTiempo.'.pdf',
            'user_id' => $idUser,
            'estado' => 1,
            'tipo' => 'Web'
        ]);

        $view = \View::make('admin/cotizador.pdfinterno',compact('data'));
        $html = $view->render();

        //$pdf = new TCPDF();
        PDF::SetTitle('cotizacion');
        PDF::AddPage();
        PDF::writeHTML($html, true, false, true, false, '');
        PDF::Output(public_path('storage').'/cotizacion/cotizacion'.$request->empresa.$marcaTiempo.'.pdf', 'F');

        $message = new EnviaCotizacion($data);
        //$message->attachData(PDF::Output($request->empresa.$marcaTiempo.'.pdf', 'E'), 'cotizacion'.$request->id.'.pdf');
        $message->attachData(PDF::Output($request->empresa.$marcaTiempo.'.pdf', 'S'), 'cotizacion'.$request->id.'.pdf');
        Mail::to($emailVendedor)->send($message);

        $messageCliente = new EnviaCotizacionCliente($data);
        Mail::to($request->email)->send($messageCliente);

        return redirect()->route('public.mi-cotizacion.index')->with('success_msg', 'Cotización solicitada con exito, pronto nos pondremos en contacto con usted.');
    }

    public function matchRut($rut){
        $result = DB::select("select vendedor from match_ruts where rut = '{$rut}' ORDER BY id desc;");

        if(empty($result)){
            $count = User::where('role_id', 2)->count();
            $rand = rand(0,$count);
            $result = DB::select("select email from users ORDER BY id desc;");

            $insertData = array(
                "rut" => $rut,
                "vendedor" => $result[$rand]->email,
                "estado" => 1,
                "procedencia" => 'Web');
             MatchRut::insertData($insertData);

            return $result[$rand]->email;
        }else{
            return $result[0]->vendedor;
        }
    }

    public function getIdUser($email){
        $result = DB::select("select id from users where email = '{$email}';");
        //dd($email);
        return $result[0]->id;
    }
}