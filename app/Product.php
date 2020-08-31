<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'product_category');
    }
    public function colors()
    {
        return $this->belongsToMany('App\Color', 'product_color');
    }
    public function impresions()
    {
        return $this->belongsToMany('App\Impresion', 'product_impresion');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $newSlug = $slug = str_slug($model->nombre);

            // Loop until we can query for the slug and it returns false
            $next = 0;
            while (Product::where('slug', '=', $newSlug)->first()) {
                $newSlug = $slug . '-' . $next;
                $next++;
            }

            $model->slug = $newSlug;

            return true;
        });
    }
}
