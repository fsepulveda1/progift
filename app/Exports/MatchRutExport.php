<?php

namespace App\Exports;

use App\MatchRut;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MatchRutExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MatchRut::all(['rut','vendedor']);
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'RUT',
            'Vendedor'
        ];
    }
}
