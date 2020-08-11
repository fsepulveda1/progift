<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Cotizacione;
use App\Client;
use App\User;
use App\MatchRut;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Mail\EnviaCotizacion;
use App\Mail\EnviaCotizacionCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function shop()
    {
        $products = DB::table('products')->take(8)->where('destacado', 1)->get();
        return view('public.index')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products]);
    }

    public function catList()
    {
        $categories = Category::all();
        return view('partials.cat-menu')->with(['categories' => $categories]);
    }

    public function cart()  {
        $cartCollection = \Cart::getContent();
        return view('public.mi-cotizacion.index')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);
    }

    public function success()  {
        return view('public.mi-cotizacion.success');
    }

    public function add(Request $request){

        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'associatedModel' => 'App\Product',
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

        $emailVendedor = $this->matchRut($request->rut);
        $idUser = $this->getIdUser($emailVendedor);
        $user = User::find($idUser);

        foreach ($cartCollection as $item) {
            $detalle[] = [
                'nombre' => $item->name,
                'color' => $item->attributes->color ?? 'no especifica',
                'imagen' => '/storage/'.$item->attributes->image,
                'sku' => $item->model->sku,
                'imprenta' => $item->attributes->impresion,
                'cantidad' => $item->quantity,
                'precio' => $item->price,
                'iva' => $item->price*0.19,
                'suma' => $item->price*0.19,
                'descripcion' => $item->model->descripcion_larga,
                'product_id' => $item->model->id
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
            'activa_total' => false,
            'activa_descuento' => false,
            'vendedor' => $user,
            'cliente' => [
                'nombre' => $request->empresa,
                'rut' => $request->rut,
                'contacto' => $request->contacto,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'comentarios' => $request->comentarios
            ]
        ];

        Cotizacione::create([
            'forma_pago' => 'web',
            'entrega' => 10,
            'detalle' => json_encode($detalle),
            'descuento' => 0,
            'neto' => $neto,
            'iva' => $IVA,
            'total' => \Cart::getTotalQuantity(),
            'client_id' => $client->id,
            'user_id' => $idUser,
            'estado' => 1,
            'tipo' => 'Web'
        ]);

        $message = new EnviaCotizacion($data);

//        $pdf = app('dompdf.wrapper');
//        $pdf = $pdf->loadView('admin/cotizador.pdfinterno', ['data'=>$data]);
//        $message->attach($pdf->output(),[
//            'as' => 'cotizacion.pdf',
//            'mime' => 'application/pdf',
//        ]);

        Mail::to($request->email)->send($message);

        $messageCliente = new EnviaCotizacionCliente($data);
        Mail::to($user->email)->send($messageCliente);

        \Cart::clear();

        return redirect()->route('cart.success');
    }

    public function matchRut($rut){
        $result = DB::select("select vendedor from match_ruts where rut = '{$rut}' ORDER BY id desc;");

        if(empty($result)){

            $lastId = 0;
            $lastUser = User::where(['role_id'=>2,'flag'=>1])->first();
            if($lastUser) {
                $lastUser->flag = 0;
                $lastUser->save();
                $lastId = $lastUser->id;
            }

            $users = User::where([
                ['role_id',2],
                ['id','<>',$lastId]
            ])->orderBy('id','asc')->get();

            foreach($users as $user) {
                if($user->id > $lastId) {
                    $newUser = $user;
                    break;
                }
            }
            if(!$newUser) {
                $newUser = $users[0];
            }

            $newUser->flag = 1;
            $newUser->save();

            $insertData = array(
                "rut" => $rut,
                "vendedor" => $newUser->email,
                "estado" => 1,
                "procedencia" => 'Web');
            MatchRut::insertData($insertData);

            return $newUser->email;
        }else{
            return $result[0]->vendedor;
        }
    }

    public function getIdUser($email){
        $result = DB::select("select id from users where email = '{$email}';");
        return $result[0]->id;
    }
}