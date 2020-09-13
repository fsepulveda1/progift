<?php

namespace App\Http\Controllers;

use App\Exports\ClientsExport;
use App\Exports\MatchRutExport;
use App\Exports\NewsletterExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export($type) {
        $exporter = null;
        $filename = 'export.xlsx';
        if($type == 'match_rut') {
            $filename = 'rut-vendedores.xlsx';
            $exporter = new MatchRutExport();
        }
        if($type == 'clients') {
            $filename = 'clientes.xlsx';
            $exporter = new ClientsExport();
        }
        if($type == 'newsletter') {
            $filename = 'newsletter.xlsx';
            $exporter = new NewsletterExport();
        }

        return Excel::download($exporter, $filename);
    }
}
