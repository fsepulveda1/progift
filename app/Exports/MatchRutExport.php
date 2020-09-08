<?php

namespace App\Exports;

use App\MatchRut;
use Maatwebsite\Excel\Concerns\FromCollection;

class MatchRutExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MatchRut::all(['rut','vendedor']);
    }
}
