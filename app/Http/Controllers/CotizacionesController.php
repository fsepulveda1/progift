<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use ReflectionClass;
use \TCG\Voyager\Database\Schema\SchemaManager;
use \TCG\Voyager\Database\Schema\Table;
use \TCG\Voyager\Database\Types\Type;
use \TCG\Voyager\Events\BreadAdded;
use \TCG\Voyager\Events\BreadDeleted;
use \TCG\Voyager\Events\BreadUpdated;
use \TCG\Voyager\Facades\Voyager;

class CotizacionesController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
    public function index()
    {
        $this->authorize('browse_bread');

        $dataTypes = Voyager::model('DataType')->select('id', 'name', 'slug')->get()->keyBy('name')->toArray();

        $tables = array_map(function ($table) use ($dataTypes) {
            $table = Str::replaceFirst(DB::getTablePrefix(), '', $table);

            $table = [
                'prefix'     => DB::getTablePrefix(),
                'name'       => $table,
                'slug'       => $dataTypes[$table]['slug'] ?? null,
                'dataTypeId' => $dataTypes[$table]['id'] ?? null,
            ];

            return (object) $table;
        }, SchemaManager::listTableNames());

        return Voyager::view('voyager::tools.bread.index')->with(compact('dataTypes', 'tables'));
    }
}