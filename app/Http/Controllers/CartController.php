<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Cotizacione;
use App\Client;
use App\ProductQuotationCount;
use App\ProductsQuotationCount;
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
        $products = DB::table('products')->take(32)->where('destacado', 1)->get();
        return view('public.index')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products]);
    }

    public function catList()
    {
        $categories = Category::all();
        return view('partials.cat-menu')->with(['categories' => $categories]);
    }

    public function cart()  {
        $cartCollection = \Cart::getContent();
        $cartCollection = $cartCollection->sortBy(function ($product, $key) {
            return $product->attributes->order;
        });
        return view('public.mi-cotizacion.index')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);
    }

    public function success()  {
        return view('public.mi-cotizacion.success');
    }

    public function add(Request $request){
        $messages = [
            'required' => 'El campo :attribute es requerido',
            'impresion.required' => 'El campo tipo de impresión es requerido',
            'min' => 'El campo :attribute permite un valor mínimo de :min',
            'max' => 'El campo :attribute permite un valor máximo de :max',
            'numeric' => 'El campo :attribute debe ser numérico',
            'exists' => 'Ha ocurrido un error al añadir el producto'
        ];

        $this->validate($request, ['id' => 'required|max:100|exists:App\Product,id'],$messages);

        $product = Product::where(['id'=>$request->id])->first();

        $rules = [
            'quantity' => 'required|numeric|max:1000000|min:1',
            'impresion' => 'required',
        ];

        if(!empty($product->colors->count())) {
            $rules['color'] = 'required';
        }

        $this->validate($request,$rules , $messages);

        $imageFirst = json_decode($product->imagen)[0];
        $qty = $request->quantity;

        \Cart::add(array(
            'id' => $product->id,
            'name' => $product->nombre,
            'price' => $product->precio,
            'quantity' => $qty,
            'associatedModel' => 'App\Product',
            'attributes' => array(
                'image' => $imageFirst,
                'color' => $request->color,
                'impresion' => $request->impresion,
                'slug' => $product->slug,
                'order' => \Cart::getContent()->count()
            )
        ));

        return redirect()->route('public.mi-cotizacion.index')->with('success_msg','Agregado al carro '. $product->nombre.' ('.$qty.')');
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

        $this->validate($request, [
            'empresa' => 'required|max:100',
            'rut' => 'required|max:12',
            'contacto' => 'required|max:50',
            'telefono' => 'required|max:20',
            'email' => 'required|max:50|email',
            'comentarios' => 'max:1000',
        ], [
            'required' => 'El campo :attribute es requerido',
            'max' => 'El campo :attribute permite un máximo de :max caracteres',
            'email' => 'El  :attribute no es válido',
        ]);

        $emailVendedor = $this->matchRut($request->rut);

        if(!$emailVendedor)
            return;

        $idUser = $this->getIdUser($emailVendedor);
        $user = User::find($idUser);
        $detalle = [];
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
            $this->incrementProductCount($item);
        }

        $client = Client::where([
            ['rut', $request->rut],
            ['email', $request->email],
            ['telefono', $request->telefono]
        ])->first();

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
            'estado' => 0,
            'tipo' => 'Web'
        ]);

        $message = new EnviaCotizacion($data);

        Mail::to($request->email)->send($message);

        $messageCliente = new EnviaCotizacionCliente($data);
        Mail::to($user->email)->send($messageCliente);

        \Cart::clear();

        return redirect()->route('cart.success');
    }

    public function incrementProductCount($item) {
        $productCount = ProductQuotationCount::where('product_id',$item->model->id)->first();

        if(!$productCount) {
            $productCount = new ProductQuotationCount();
            $productCount->product_id = $item->model->id;
        }
        $productCount->count ++;
        $productCount->save();
    }

    public function matchRut($rut){
        $result = DB::select("select vendedor from match_ruts where rut = '{$rut}'");

        if(empty($result)){

            $lastName = '';
            $lastId = 0;
            $lastUser = User::where(['role_id'=>2,'flag'=>1])->first();
            if($lastUser) {
                $lastUser->flag = 0;
                $lastUser->save();
                $lastId = $lastUser->id;
                $lastName = $lastUser->nombre;
            }

            $users = User::where([
                ['role_id',2],
                ['id','<>',$lastId]
            ])->orderBy('nombre','asc')->get();

            foreach($users as $user) {
                if($user->nombre > $lastName) {
                    $newUser = $user;
                    break;
                }
            }
            if(!isset($newUser) and isset($users[0])) {
                $newUser = $users[0];
            }

            if(isset($newUser)) {
                $newUser->flag = 1;
                $newUser->save();

                $insertData = array(
                    "rut" => $rut,
                    "vendedor" => $newUser->email,
                    "estado" => 1,
                    "procedencia" => 'Web');
                MatchRut::insertData($insertData);

                return $newUser->email;
            }
        }
        else{
            return $result[0]->vendedor;
        }
    }

    public function getIdUser($email){
        $result = DB::select("select id from users where email = '{$email}';");
        return $result[0]->id;
    }
}