<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cotizacione extends Model
{
    protected $fillable = ['nombre', 'validez', 'empresa', 'forma_pago', 'email', 'entrega', 'detalle', 'descuento', 'neto', 'iva', 'total', 'estado', 'client_id', 'user_id', 'created_at', 'pdf', 'tipo', 'notas'];

    public function client()
    {
        return $this->belongsTo('App\Client', 'client_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
