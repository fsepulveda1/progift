<?php

namespace App\Http\Controllers;

use DB;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['show','showDestacados']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::orderBy('id', 'desc')->get();

        return view('admin.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        //Validar campos
        $data = request()->validate([
            'nombre' => 'required|max:100',
            'category_descripcion' => 'required',
            'estado' => 'required',
            'orden' => 'required',
            'image' => 'required|image'
        ]);

        $fileNameWithTheExtension = request('image')->getClientOriginalName();

        $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);

        $extension = request('image')->getClientOriginalExtension();

        $newFileName = $fileName . '_' . time() . '.' . $extension;

        $path = request('image')->storeAs('public/images/categories_images', $newFileName);

        // dd($extension);

        $user = auth()->user();
        $category = new Category();

        $category->nombre = request('nombre');
        $category->descripcion = request('category_descripcion');
        $category->orden = request('orden');
        $category->estado = request('estado');
        $category->image_url = $newFileName;

        $category->save();

        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $category = Category::where('id',$id)->orWhere('slug',$id)->first();

        $products = Product::whereHas('categories', function ($query) use ($category) {
            $query->where('id', '=', $category->id);
        })->orderBy('nombre','asc')->get();
        $lastPage = null;

        if ($request->ajax()) {
            $view = view('public.products.data',compact('products'))->render();
            return response()->json(['html'=>$view,'lastPage'=>$lastPage]);
        }


        return view('public.categories.show', compact('category', 'products','lastPage'));
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function showDestacados(Request $request)
    {
        $products = Product::where('destacado',1)->orderBy('nombre','ASC')->get();
        $lastPage = null;

        if ($request->ajax()) {
            $view = view('public.products.data',compact('products'))->render();
            return response()->json(['html'=>$view,'lastPage'=>$lastPage]);
        }

        return view('public.categories.showDestacados', compact('products','lastPage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $category = Category::find($category->id);

        return view('admin/categories/edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //validar campos
        $data = request()->validate([
            'nombre' => 'required|max:100',
            'category_descripcion' => 'required',
            'estado' => 'required',
            'orden' => 'required',
            'image' => 'required|image'
        ]);

        $fileNameWithTheExtension = request('image')->getClientOriginalName();

        $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);

        $extension = request('image')->getClientOriginalExtension();

        $newFileName = $fileName . '_' . time() . '.' . $extension;

        $path = request('image')->storeAs('public/images/categories_images', $newFileName);

        // dd($extension);

        $category = Category::findOrFail($category->id);

        $category->nombre = request('nombre');
        $category->descripcion = request('category_descripcion');
        $category->orden = request('orden');
        $category->estado = request('estado');
        $category->image_url = $newFileName;

        $category->save();

        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category = Category::find($request->category_id);

        $oldImage = public_path() . '/storage/images/categories_images/'. $category->image_url;

        if(file_exists($oldImage)){
            //Elimina imagen
            unlink($oldImage);
        }

        $category->delete();

        return redirect('/categories');
    }
}
