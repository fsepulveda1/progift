<?php

namespace App\Http\Controllers;

use App\Imports\MatchRutImport;
use App\MatchRut;
use App\CsvData;
use App\Http\Requests\CsvImportRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Maatwebsite\Excel\Validators\Failure;

class ImportController extends Controller
{

    public function getImport()
    {
        return view('importer.import');
    }

    public function uploadFile(Request $request){

        $rules = ['file' => 'required|max:5000'];
        $messages['file'] = 'El tamaño máximo permitido es 5 MB';
        $messages['required'] = 'Debes seleccionar un archivo';
        $messages['mimes'] = 'La extensión del archivo debe ser xlsx';

        $extension = File::extension($request->file->getClientOriginalName());

        if ($extension !== "xlsx" && $extension !== "xls" && $extension !== "csv")
            return back()->with([
                'message' => 'La extensión del archivo no es válida',
                'alert-type' => 'error',
            ]);

        $request->validate($rules,$messages);

        $file = $request->file('file');
        $import = new MatchRutImport();
        $import->import($file);

        if($failures = $import->failures()) {
            return $this->generateFailureForm($failures);
        }

        return back()->with([
            'message' => 'Importación correcta',
            'alert-type' => 'success',
        ]);
    }

    public function generateFailureForm(Collection $failures) {
        $values = [];

        /** @var Failure $failure */
        foreach($failures as $key => $failure) {
            $row = $failure->values();
            $matchRut = MatchRut::where('rut',$row[0])->first();

            if($matchRut->vendedor == $row[1])
                continue;

            $values[] = [
                'rut' => $matchRut->rut,
                'old' => $matchRut->vendedor,
                'new' => $row[1]
            ];
        }

        if(! $values)
            return back()->with([
                'message' => 'Importación correcta',
                'alert-type' => 'success',
            ]);

        return view('importer.failures_form',['values'=>$values]);
    }

    public function processFailures(Request $request) {
        $values = $request->get('vendedor');

        foreach($values as $rut => $email) {
            MatchRut::where('rut',$rut)->update(['vendedor'=>$email]);
        }

        return redirect()->route('import')->with([
            'message' => 'Importación correcta',
            'alert-type' => 'success'
        ]);
    }

    public function getVendedoresForm() {

        $emails = MatchRut::select('vendedor')->distinct()->get()->toArray();
        $emails = array_map('end',$emails);
        return view('importer.vendedores',compact('emails'));
    }

    public function saveVendedores(Request $request) {

        $rules = ['emails.*.new' => 'required|email'];
        $messages = [
            'required' => 'No puede ingresar un email vacío',
            'email' => 'El email ":input" no es válido',
        ];

        $this->validate($request,$rules,$messages);

        foreach($request->emails as $email) {
            if($email['old'] != $email['new']) {
                MatchRut::where('vendedor', $email['old'])
                    ->update(['vendedor' => $email['new']]);
            }
        }

        return redirect()->route('email.vendedores')->with([
            'message' => 'Vendedores actualizados',
            'alert-type' => 'success'
        ]);
    }

}