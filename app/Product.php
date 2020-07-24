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
}
