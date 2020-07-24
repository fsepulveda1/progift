<?php

namespace App\Http\Controllers;

use DB;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')
                    ->get();

        return view('admin.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
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
            'name' => 'required|max:50',
            'slug' => 'required|max:20',
            'details' => 'required|max:100',
            'price' => 'required',
            'shipping_cost' => 'required',
            'descripcion' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'image' => 'required|image'
        ]);

        $fileNameWithTheExtension = request('image')->getClientOriginalName();

        $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);

        $extension = request('image')->getClientOriginalExtension();

        $newFileName = $fileName . '_' . time() . '.' . $extension;

        $path = request('image')->storeAs('public/images/products_images', $newFileName);

        // dd($extension);

        $user = auth()->user();
        $product = new Product();

        $product->name = request('name');
        $product->slug = request('slug');
        $product->details = request('details');
        $product->price = request('price');
        $product->shipping_cost = request('shipping_cost');
        $product->description = request('descripcion');
        $product->category_id = request('category_id');
        $product->brand_id = request('brand_id');
        $product->image_path = $newFileName;
        //$post->userId = $user->id;

        $product->save();

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Find the product with the id = $id
        //$product = Product::find($id);
        $categories = Category::orderBy('orden', 'ASC')->get();

        /*
        $product = DB::select('select m.*, a.nombre AS nombre_categoria
        from Products m
        inner join product_category am on m.id = am.product_id
        inner join Categories a on am.category_id = a.id
        where m.id = ?', [$id]);
        */

        $product = Product::with('colors', 'impresions', 'categories')->find($id);
        $products = Product::find($id)->get();

        return view('public.products.show', compact('product', 'categories', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product = Product::find($product->id);

        return view('admin/products/edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //validar campos
        $data = request()->validate([
            'name' => 'required|max:50',
            'slug' => 'required|max:20',
            'details' => 'required|max:100',
            'price' => 'required',
            'shipping_cost' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'image' => 'required|image'
        ]);

        $fileNameWithTheExtension = request('image')->getClientOriginalName();

        $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);

        $extension = request('image')->getClientOriginalExtension();

        $newFileName = $fileName . '_' . time() . '.' . $extension;

        $path = request('image')->storeAs('public/images/products_images', $newFileName);

        // dd($extension);

        $product = Product::findOrFail($product->id);

        $product->name = request('name');
        $product->slug = request('slug');
        $product->details = request('details');
        $product->price = request('price');
        $product->shipping_cost = request('shipping_cost');
        $product->description = request('description');
        $product->category_id = request('category_id');
        $product->brand_id = request('brand_id');
        $product->image_path = $newFileName;

        $product->save();

        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product = Product::find($request->product_id);

        $oldImage = public_path() . '/storage/images/products_images/'. $product->image_path;

        if(file_exists($oldImage)){
            //Elimina imagen
            unlink($oldImage);
        }

        $product->delete();

        return redirect('/products');
    }
}
