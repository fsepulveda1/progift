<?php

namespace App\Http\Controllers;

use App\Exports\MatchRutExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportMatchRut(Request $request) {
        return Excel::download(new MatchRutExport(), 'match_rut.xlsx');
    }
}
