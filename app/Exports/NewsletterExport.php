<?php

namespace App\Exports;

use App\Newsletter;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class NewsletterExport implements FromCollection, WithHeadings, WithColumnFormatting, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Newsletter::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Email',
            'Fecha inscripción'
        ];
    }

    /**
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    /**
     * @param mixed $newsletter
     * @return array
     * @internal param mixed $row
     *
     */
    public function map($newsletter): array
    {
        return [
            $newsletter->email,
            Date::dateTimeToExcel($newsletter->created_at)
        ];
    }
}
