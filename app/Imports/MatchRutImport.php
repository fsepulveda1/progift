<?php

namespace App\Imports;

use App\MatchRut;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Row;

class MatchRutImport implements OnEachRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;

    public function onRow(Row $row)
    {
        $rowIndex = $row->getIndex();
        $row      = $row->toArray();

        if(empty($row[0]) || empty($row[1])) {
            return null;
        }

        if(empty($row[0]) || empty($row[1])) {
            return null;
        }

        MatchRut::firstOrCreate([
            'rut'     => $row[0],
            'vendedor'    => $row[1],
            'estado' => 1
        ], [
            'procedencia' => 'IMPORTADOR'
        ]);
    }

    public function rules(): array
    {
        return [
            0 => Rule::unique('match_ruts','rut'),
        ];
    }
}