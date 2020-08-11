<?php

namespace App\Http\Controllers;

use App\Product;
use App\Tip;
use DB;
use App\Category;
use App\Contacto;
use App\Newsletter;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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
        $posts = Tip::orderBy('id', 'desc')->paginate(3);
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

        return view('public.products.buscar', compact('products','lastPage','textSearch'));
    }
    

    public function contacto(Request $request){

        if($request->isMethod('post')){
            Contacto::create($request->all());

            return view('public.contacto.index')->with('success_msg', 'Hemos recibido su información, pronto nos contactaremos con usted.');
        }else{
            return view('public.contacto.index');
        }
        
    }

    public function suscribe(Request $request){
        if($request->isMethod('post')){
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
