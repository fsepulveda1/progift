<?php

namespace App\Http\Controllers\Voyager;

use TCG\Voyager\Http\Controllers\VoyagerController as BaseVoyagerController;
use App\Cotizacione;
use App\Product;
use App\Client;
use DB;

class VoyagerController extends BaseVoyagerController
{
    //
    public function index()
    {
        $clientes = DB::table('clients')->select('id')->count();
        $clienteshoy = DB::table('clients')->select('select * from clients where created_at BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()')->count();
        $productos = DB::table('products')->select('id')->count();
        $productoshoy = DB::table('products')->select('select * from products where created_at BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()')->count();
        $cotizaciones = DB::table('cotizaciones')->select('id')->count();
        $cotizacioneshoy = DB::table('cotizaciones')->select('select * from cotizaciones where created_at BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()')->count();
        //$totalhoy = DB::table('cotizaciones')->where('created_at BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()')->sum('total');
        $total = DB::table('cotizaciones')->sum('total');
        return view('vendor.voyager.index', compact('clientes', 'clienteshoy', 'cotizaciones', 'cotizacioneshoy', 'total', 'productos', 'productoshoy'));
    }
}
