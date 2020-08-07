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
        $categories = Category::orderBy('orden', 'ASC')->get();
        $lastPage = $posts->lastPage();

        if ($request->ajax()) {
            $view = view('public.tips.data',compact('posts'))->render();
            return response()->json(['html'=>$view,'lastPage'=>$lastPage]);
        }


        return view('public.tips.index', compact('posts', 'categories','lastPage'));
    }

    public function show($slug)
    {
        $post = Tip::where('slug', $slug)->first();
        $categories = Category::orderBy('orden', 'ASC')->get();

        if($post == "null"){
            $this->index();
        }
        return view('public.tips.show', compact('post', 'categories'));
    }

    public function buscar(Request $request){
        $q  = $request->q;

        $products = Product::with('colors', 'impresions', 'categories')->where('nombre', 'LIKE', "%{$q}%")->get();

        $categories = Category::orderBy('orden', 'ASC')->get();

        return view('public.products.buscar', compact('categories', 'products'));
    }
    

    public function contacto(Request $request){
        $categories = Category::orderBy('orden', 'ASC')->get();
        if($request->isMethod('post')){
            Contacto::create($request->all());

            return view('public.contacto.index', compact('categories'))->with('success_msg', 'Hemos recibido su información, pronto nos contactaremos con usted.');
        }else{
            return view('public.contacto.index', compact('categories'));
        }
        
    }

    public function suscribe(Request $request){
        if($request->isMethod('post')){
            Newsletter::create($request->all());

            return back()->with('news_msg', 'Suscrito correctamente.');
        }
    }


    public function faq(){
        $categories = Category::orderBy('orden', 'ASC')->get();
        return view('public.preguntas-frecuentes.index', compact('categories'));
    }

    public function empresa(){
        $categories = Category::orderBy('orden', 'ASC')->get();
        return view('public.nuestra-empresa.index', compact('categories'));
    }



    
}
