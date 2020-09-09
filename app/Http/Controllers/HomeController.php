<?php

namespace App\Http\Controllers;

use App\Mail\EnviaContacto;
use App\Product;
use App\Tip;
use DB;
use App\Category;
use App\Contacto;
use App\Newsletter;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     * @throws \Throwable
     */
    public function index(Request $request)
    {
        $posts = Tip::orderBy('id', 'asc')->paginate(3);
        $lastPage = $posts->lastPage();

        if ($request->ajax()) {
            $view = view('public.tips.data',compact('posts'))->render();
            return response()->json(['html'=>$view,'lastPage'=>$lastPage]);
        }


        return view('public.tips.index', compact('posts','lastPage'));
    }

    public function show($slug)
    {
        $post = Tip::where('slug', $slug)->first();

        if($post == "null"){
            $this->index();
        }
        return view('public.tips.show', compact('post'));
    }

    public function buscar(Request $request){
        $textSearch  = $request->q;
        $products = Product::with('colors', 'impresions', 'categories')->where('nombre', 'LIKE', "%{$textSearch}%")->paginate(16);
        $lastPage = $products->lastPage();

        if ($request->ajax()) {
            $view = view('public.products.data',compact('products'))->render();
            return response()->json(['html'=>$view,'lastPage'=>$lastPage]);
        }

        return view('public.products.buscar', compact('products','lastPage','textSearch','textSearch'));
    }


    public function contacto(Request $request){

        if($request->isMethod('post')){

            $this->validate($request, [
                'empresa' => 'required|max:100',
                'rut' => 'required|cl_rut|max:12',
                'contacto' => 'required|max:50',
                'telefono' => 'required|max:20',
                'email' => 'required|max:50|email',
                'comentarios' => 'required|max:1000',
            ], [
                'required' => 'El campo :attribute es requerido',
                'max' => 'El campo :attribute permite un máximo de :max caracteres',
                'email' => 'El  :attribute no es válido',
                'cl_rut' => 'El RUT ingresado no es válido'
            ]);

            $contacto = Contacto::create($request->all());

            $message = new EnviaContacto($contacto);
            Mail::to(Voyager::setting('admin.email_contacto', ''))->send($message);

            Session::flash('success_msg', 'Hemos recibido su información, pronto nos contactaremos con usted.');
            return view('public.contacto.index');

        } else {
            return view('public.contacto.index');
        }

    }

    public function suscribe(Request $request){
        if($request->isMethod('post')){

            $this->validate($request, [
                'email' => 'required|max:100',
            ], [
                'required' => 'El campo :attribute es requerido',
                'max' => 'El campo :attribute permite un máximo de :max caracteres',
            ]);

            Newsletter::create($request->all());

            return back()->with('news_msg', 'Suscrito correctamente.');
        }
    }


    public function faq(){
        return view('public.preguntas-frecuentes.index');
    }

    public function empresa(){
        return view('public.nuestra-empresa.index');
    }

}
