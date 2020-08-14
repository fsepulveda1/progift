<?php

namespace App\Console\Commands;

use App\Category;
use App\Color;
use App\Product;
use Illuminate\Console\Command;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Exception;

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

            $images = explode('|',$product->progift_galeria);
            $imgs = [];
            $meta_value = DB::connection('wordpress')->select('select pm.meta_value from progift_actual.wp_postmeta pm inner join progift_actual.wp_posts p on p.id = pm.post_id where pm.meta_key="_thumbnail_id" and p.post_name="'.$product->Slug.'"');
            if(isset($meta_value[0])) {
                $meta_value = $meta_value[0]->meta_value;
                $images[] = $meta_value;
            }

            foreach($images as $image_id) {

                $guid = DB::connection('wordpress')->select('select guid from progift_actual.wp_posts where id='.(int)trim($image_id));

                if (isset($guid[0])) {
                    $img_url = $guid[0]->guid;
                    $name = substr($img_url, strrpos($img_url, '/') + 1);
                    try {
                        $contents = file_get_contents("/Users/Desarrollo4/Desktop/uploads/" . $name);
                    }
                    catch (\Exception $e) {

                        $contents = file_get_contents($img_url);
                    }
                    Storage::put("public/products/migrated/".$name, $contents);
                    $imgs[] = "products/migrated/".$name;
                }

            }

            $this->info($product->Title);

            $newProduct = new Product();
            $newProduct->nombre = $product->Title;
            $newProduct->destacado = $product->progift_destacado;
            $newProduct->descripcion_larga = html_entity_decode($product->Content);
            $newProduct->descripcion_corta = '';
            $newProduct->sku = $product->progift_codigo ?? '-';
            $newProduct->precio = 0;
            $newProduct->estado = 1;
            $newProduct->imagen = json_encode($imgs);
            $newProduct->save();

            $categories = explode('|',$product->Categor_as);
            $colors = unserialize($product->progift_colores);

            foreach($categories as $categoryName) {
                if (strpos($categoryName, '>') !== false) {
                    $this->info($categoryName);
                    $categoryName = explode('>',$categoryName)[0];
                }
                $category = Category::where('nombre', html_entity_decode(trim($categoryName)))->first();

                if(!$category) {
                    $category = new Category();
                    $category->nombre = html_entity_decode(trim($categoryName));
                    $category->estado = 1;
                    $category->save();
                }

                $newProduct->categories()->save($category);
            }

            if(!empty($colors)) {
                foreach ($colors as $colorName) {
                    $colorName = ucwords(mb_strtolower($colorName));

                    $color = Color::where('nombre', html_entity_decode(trim($colorName)))->first();

                    if (!$color) {
                        $color = new Color();
                        $color->nombre = html_entity_decode(trim($colorName));
                        $color->save();
                    }

                    $newProduct->colors()->save($color);
                }
            }

        }

    }
}
