<?php

namespace App\Exports;

use App\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Client::all(['nombre','rut','contacto','telefono','email']);
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Empresa',
            'RUT',
            'Nombre Cliente',
            'Teléfono',
            'Email'
        ];
    }
}
