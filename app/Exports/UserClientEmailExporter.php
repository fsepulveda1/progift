<?php

namespace App\Exports;

use App\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UserClientEmailExporter implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
         return DB::table('users')
            ->join('cotizaciones','users.id','=','cotizaciones.user_id')
            ->join('clients','clients.id','=','cotizaciones.client_id')
            ->select('users.name','clients.email')->distinct()->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Vendedor',
            'Email Cliente'
        ];
    }

    /**
     * @param mixed $newsletter
     * @return array
     * @internal param mixed $row
     *
     */
    public function map($row): array
    {
        return [
            $row->name,
            $row->email
        ];
    }
}
