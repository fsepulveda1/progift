<?php

namespace App\Console\Commands;

use App\Category;
use App\Color;
use App\Product;
use App\ProductCategory;
use App\ProductColor;
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

    private $keys = [
        'progift_codigo',
        'progift_colores',
        'progift_destacado',
        '_thumbnail_id',
        'progift_galeria'
    ];

    private $wp_connection;

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
        Product::truncate();
        Color::truncate();
        Category::truncate();

        $this->wp_connection = DB::connection('wordpress');

        $products = $this->wp_connection->select(
            'select * from progift_actual.wp_posts as wpost where wpost.post_type="post"'
        );

        foreach($products as $product) {
            $code = "-";
            $promoted = 0;
            $colors = [];
            $gallery = [];
            $description = $product->post_content;
            $name = $product->post_title;
            $meta_values = $this->getMetaValues($product);
            if(!empty($meta_values['progift_codigo'])) {
                $code = end($meta_values['progift_codigo']);
            }
            if(!empty($meta_values['progift_destacado'])) {
                $promoted = end($meta_values['progift_destacado']);
            }
            if(!empty($meta_values['progift_colores'])) {
                $colors = unserialize(end($meta_values['progift_colores']));
            }
            if(!empty($meta_values['_thumbnail_id'])) {
                $gallery[] = end($meta_values['_thumbnail_id']);
            }
            if(!empty($meta_values['progift_galeria'])) {
                $gallery = array_merge($gallery,$meta_values['progift_galeria']);
            }

            $categories = $this->getCategories($product);

            $gallery = $this->getJsonGallery($gallery);

            $newProduct = new Product();
            $newProduct->nombre = $name;
            $newProduct->destacado = $promoted;
            $newProduct->descripcion_larga = html_entity_decode($description);
            $newProduct->descripcion_corta = '';
            $newProduct->sku = $code;
            $newProduct->precio = 0;
            $newProduct->estado = 1;
            $newProduct->imagen = $gallery;
            $newProduct->save();

            $this->info($name);

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

            foreach($categories as $categoryName) {
                if (strpos($categoryName, '>') !== false) {
                    $categoryName = explode('>',$categoryName)[0];
                }
                $categoryName = html_entity_decode(trim(ucwords(mb_strtolower($categoryName))));
                $category = Category::where('nombre', $categoryName)->first();

                if(!$category) {
                    $category = new Category();
                    $category->nombre = $categoryName;
                    $category->estado = 1;
                    $category->save();
                }

                $newProduct->categories()->save($category);
            }

        }

    }

    private function getMetaValues($product)
    {
        $values = [];
        foreach ($this->keys as $meta_key) {
            $meta_value = $this->wp_connection->select(
                'select pm.meta_value from progift_actual.wp_postmeta as pm where pm.meta_key = "' . $meta_key . '" and  post_id = ' . $product->ID
            );
            $values[$meta_key] = array_map(function($item) { return $item->meta_value;},$meta_value);
        }
        return $values;
    }

    private function getCategories($product)
    {
        $categories = [];
        $terms = $this->wp_connection->select(
            'select t.name,tt.parent from progift_actual.wp_term_relationships as tr '.
            'inner join progift_actual.wp_terms as t ON tr.term_taxonomy_id = t.term_id '.
            'inner join progift_actual.wp_term_taxonomy as tt ON tt.term_taxonomy_id = t.term_id '.
            'where tr.object_id = ' .$product->ID
        );


        foreach($terms as $term) {
            if($term->parent !== 0) {
                $parent = $this->wp_connection->select(
                    'select t.name from progift_actual.wp_terms as t where t.term_id = '.$term->parent
                );
                $term = end($parent);
            }
            $categories[] = $term->name;
        }

        return $categories;
    }

    private function getJsonGallery($gallery) {
        $images = [];
        $gallery = array_unique($gallery);
        foreach($gallery as $image_id) {

            $guid = DB::connection('wordpress')->select('select guid from progift_actual.wp_posts where id='.(int)trim($image_id));

            if (isset($guid[0])) {
                $img_url = $guid[0]->guid;
                $subPath = str_replace('http://pro-gift.cl/wp-content/','',$img_url);
                $subPath = str_replace('http://www.pro-gift.cl/wp-content/','',$subPath);
                $subPath = str_replace('https://www.pro-gift.cl/wp-content/','',$subPath);
                $name = substr($img_url, strrpos($img_url, '/') + 1);

                try {
                    $contents = file_get_contents("/Users/Desarrollo4/Desktop/" . $subPath);
                }
                catch (\Exception $e) {
                    $contents = file_get_contents($img_url);
                }
                $parts = explode('.',$name);
                if(count($parts) < 2)
                    continue;

                $x = 0;
                while(Storage::exists("public/products/migrated/".$name)) {
                    $name = $parts[0]."_".$x++.".".$parts[1];
                }
                Storage::put("public/products/migrated/" . $name, $contents);
                $images[] = "products/migrated/".$name;
            }
        }

        return json_encode($images);
    }
}
