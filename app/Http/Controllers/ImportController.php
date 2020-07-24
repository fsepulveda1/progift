<?php

namespace App\Http\Controllers;

use App\MatchRut;
use App\CsvData;
use App\Http\Requests\CsvImportRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class ImportController extends Controller
{

    public function getImport()
    {
        return view('import');
    }

    public function parseImport(CsvImportRequest $request)
    {

        $path = $request->file('csv_file')->getRealPath();

        if ($request->has('header')) {
            //$data = Excel::import($path, function($reader) {})->get()->toArray();
            $data = Excel::import(new MatchRut,request()->file('csv_file'));
        } else {
            $data = array_map('str_getcsv', file($path));
        }

        if (count($data) > 0) {
            if ($request->has('header')) {
                $csv_header_fields = [];
                foreach ($data[0] as $key => $value) {
                    $csv_header_fields[] = $key;
                }
            }
            $csv_data = array_slice($data, 0, 2);

            $csv_data_file = CsvData::create([
                'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
                'csv_header' => $request->has('header'),
                'csv_data' => json_encode($data)
            ]);
        } else {
            return redirect()->back();
        }

        return view('import_fields', compact( 'csv_header_fields', 'csv_data', 'csv_data_file'));

    }

    public function processImport(Request $request)
    {
        $data = CsvData::find($request->csv_data_file_id);
        $csv_data = json_decode($data->csv_data, true);
        foreach ($csv_data as $row) {
            $contact = new MatchRut();
            foreach (config('app.db_fields') as $index => $field) {
                if ($data->csv_header) {
                    $contact->$field = $row[$request->fields[$field]];
                } else {
                    $contact->$field = $row[$request->fields[$index]];
                }
            }
            $contact->save();
        }

        return view('import_success');
    }


    public function getFileDelimiter($file, $checkLines = 2){
        $file = new \SplFileObject($file);
        $delimiters = array(
          ',',
          '\t',
          ';',
          '|',
          ':'
        );
        $results = array();
        $i = 0;
         while($file->valid() && $i <= $checkLines){
            $line = $file->fgets();
            foreach ($delimiters as $delimiter){
                $regExp = '/['.$delimiter.']/';
                $fields = preg_split($regExp, $line);
                if(count($fields) > 1){
                    if(!empty($results[$delimiter])){
                        $results[$delimiter]++;
                    } else {
                        $results[$delimiter] = 1;
                    }   
                }
            }
           $i++;
        }
        $results = array_keys($results, max($results));
        return $results[0];
    }



    public function uploadFile(Request $request){

          $file = $request->file('file');
    
          $filename = $file->getClientOriginalName();
          $extension = $file->getClientOriginalExtension();
          $tempPath = $file->getRealPath();
          $fileSize = $file->getSize();
          $mimeType = $file->getMimeType();
          $valid_extension = array("csv");

          $maxFileSize = 209715200; 
          if(in_array(strtolower($extension),$valid_extension)){
    
            if($fileSize <= $maxFileSize){
              $location = 'uploads';

              $file->move($location,$filename);

              $filepath = public_path($location."/".$filename);

              $delimiter = $this->getFileDelimiter($filepath);

              $file = fopen($filepath,"r");
    
              $importData_arr = array();
              $i = 0;


    
              while (($filedata = fgetcsv($file, 1000, $delimiter)) !== FALSE) {
                 $num = count($filedata );
                 
                 /*if($i == 0){
                    $i++;
                    continue; 
                 }*/
                 for ($c=0; $c < $num; $c++) {
                    $importData_arr[$i][] = $filedata [$c];
                 }
                 $i++;
              }
              fclose($file);
    
              foreach($importData_arr as $importData){
    
                /*
                $insertData = array(
                   "rut"=>$importData[0],
                   "vendedor"=>$importData[1],
                   "estado"=>$importData[2],
                   "procedencia"=>'importador');
                MatchRut::insertData($insertData);
                */

                DB::table('match_ruts')
                ->updateOrInsert(
                    ['rut' => str_replace(".", "", $importData[0])],
                    ['vendedor' => $importData[1], 'estado' => $importData[2], 'procedencia' => 'importador']
                );
    
              }
    
              return back()->with([
                    'message'    => 'Importación correcta',
                    'alert-type' => 'success',
                ]);
            }else{
                return back()->with([
                    'message'    => 'Archivo muy pesado',
                    'alert-type' => 'success',
                ]);
            }
    
          }else{
            return back()->with([
                'message'    => 'Archivo con extensión no válida, debe subir un CSV.',
                'alert-type' => 'success',
            ]);
          }
      }

}