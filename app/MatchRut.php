<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MatchRut extends Model
{
    public $fillable = ['rut', 'vendedor', 'estado', 'procedencia'];

    public static function insertData($data){
        DB::table('match_ruts')->insert($data);
     }
}