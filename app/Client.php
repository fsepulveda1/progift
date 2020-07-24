<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Client extends Model
{
    protected $fillable = ['nombre', 'rut', 'contacto', 'telefono', 'email', 'comentarios']; 
}
