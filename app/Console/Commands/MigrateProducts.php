<?php

namespace App\Console\Commands;

use App\Category;
use App\Color;
use App\Product;
use Illuminate\Console\Command;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class MigrateProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Realiza una carga masiva de los productos en la tabla "productos"';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /** @var \Illuminate\Database\Schema\Builder $qb */
        $products = DB::table('productos')->get();

        foreach($products as $product) {
            $this->info($product->Title);
            $product = new Product();
            $product->nombre = $product->Title;
            $product->destacado = $product->progift_destacado;
            $product->descripcion_larga = $product->Content;

            $categories = explode('|',$products->Categor_as);
            $colors = explode('|',$products->progift_colores);
            foreach($categories as $categoryName) {
                $category = Category::where('nombre', $categoryName)->first();

                if(!$category) {
                    $category = new Category();
                    $category->nombre = $categoryName;
                    $category->estado = 1;
                    $category->save();
                }

                $product->categories()->associate($category);
            }

            foreach($colors as $colorName) {
                $color = Color::where('nombre', $colorName)->first();

                if(!$color) {
                    $color = new Color();
                    $color->nombre = $colorName;
                    $color->save();
                }

                $product->colors()->associate($color);
            }

            $product->save();
        }

    }
}
