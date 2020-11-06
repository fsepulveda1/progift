<?php

namespace App\Http\Controllers\Voyager;

use App\Color;
use App\Http\Controllers\Controller;
use App\Impresion;
use App\Mail\EnviaCotizacionFinal;
use App\MatchRut;
use App\User;
use Barryvdh\DomPDF\PDF;
use DB;
use Illuminate\Http\UploadedFile;
use Mail;
use App\Category;
use App\Product;
use App\Cotizacione;
use App\Client;
use App\Mail\EnviaCotizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;
use TCG\Voyager\Facades\Voyager;


class VoyagerMatchRutsController extends VoyagerBaseController
{


    public function index(Request $request)
    {
// GET THE SLUG, ex. 'posts', 'pages', etc.
        $slug = $this->getSlug($request);

// GET THE DataType based on the slug
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

// Check permission
        $this->authorize('browse', app($dataType->model_name));

        $filters['vendedor'] = $request->get('vendedor');
        $filters['procedencia'] = $request->get('procedencia');
        $filters['fecha_desde'] = $request->get('fecha_desde');
        $filters['fecha_hasta'] = $request->get('fecha_hasta');
        $filters['rut'] = $request->get('rut');

        $getter = $dataType->server_side ? 'paginate' : 'get';
        $search = new stdClass();
        $search->value = $request->get('s');
        $search->filter = '';
        $search->key = '';

        $orderBy = $request->get('order_by', $dataType->order_column);
        $sortOrder = $request->get('sort_order', $dataType->order_direction);
        $usesSoftDeletes = false;
        $showSoftDeleted = false;

// Next Get or Paginate the actual content from the MODEL that corresponds to the slug DataType
        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);

            if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope' . ucfirst($dataType->scope))) {
                $query = $model->{$dataType->scope}();
            } else {
                $query = $model::select('match_ruts.*');
            }

// Use withTrashed() if model uses SoftDeletes and if toggle is selected
            if ($model && in_array(SoftDeletes::class, class_uses_recursive($model)) && Auth::user()->can('delete', app($dataType->model_name))) {
                $usesSoftDeletes = true;

                if ($request->get('showSoftDeleted')) {
                    $showSoftDeleted = true;
                    $query = $query->withTrashed();
                }
            }

            if($filters['rut'])
                $query->where('match_ruts.rut',$filters['rut']);

            if($filters['procedencia'])
                $query->where('match_ruts.procedencia',$filters['procedencia']);

            if($filters['vendedor'])
                $query->where('match_ruts.vendedor',$filters['vendedor']);

            if(!empty($filters['fecha_desde'])) {
                $from = \DateTime::createFromFormat('d-m-Y',$filters['fecha_desde']);
                $query->whereDate('match_ruts.created_at','>=', $from->format('Y-m-d'));
            }

            if(!empty($filters['fecha_hasta'])) {
                $from = \DateTime::createFromFormat('d-m-Y',$filters['fecha_hasta']);
                $query->whereDate('match_ruts.created_at','<=', $from->format('Y-m-d'));
            }

            if ($orderBy && in_array($orderBy, $dataType->fields())) {
                $querySortOrder = (!empty($sortOrder)) ? $sortOrder : 'desc';
                $dataTypeContent = call_user_func([
                    $query->orderBy($orderBy, $querySortOrder),
                    $getter,
                ]);
            } elseif ($model->timestamps) {
                $dataTypeContent = call_user_func([$query->latest($model::CREATED_AT), $getter]);
            } else {
                $dataTypeContent = call_user_func([$query->orderBy($model->getKeyName(), 'DESC'), $getter]);
            }

// Replace relationships' keys for labels and create READ links if a slug is provided.
            $dataTypeContent = $this->resolveRelations($dataTypeContent, $dataType);
        } else {
// If Model doesn't exist, get data from table name
            $dataTypeContent = call_user_func([DB::table($dataType->name), $getter]);
            $model = false;
        }

// Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($model);

// Eagerload Relations
        $this->eagerLoadRelations($dataTypeContent, $dataType, 'browse', $isModelTranslatable);

// Check if server side pagination is enabled
        $isServerSide = isset($dataType->server_side) && $dataType->server_side;

// Check if a default search key is set
        $defaultSearchKey = $dataType->default_search_key ?? null;

// Actions
        $actions = [];
        if (!empty($dataTypeContent->first())) {
            foreach (Voyager::actions() as $action) {
                $action = new $action($dataType, $dataTypeContent->first());

                if ($action->shouldActionDisplayOnDataType()) {
                    $actions[] = $action;
                }
            }
        }

// Define showCheckboxColumn
        $showCheckboxColumn = false;
        if (Auth::user()->can('delete', app($dataType->model_name))) {
            $showCheckboxColumn = true;
        } else {
            foreach ($actions as $action) {
                if (method_exists($action, 'massAction')) {
                    $showCheckboxColumn = true;
                }
            }
        }

// Define orderColumn
        $orderColumn = [];
        if ($orderBy) {
            $index = $dataType->browseRows->where('field', $orderBy)->keys()->first() + ($showCheckboxColumn ? 1 : 0);
            $orderColumn = [[$index, $sortOrder ?? 'desc']];
        }

        $view = 'voyager::bread.browse';

        if (view()->exists("voyager::$slug.browse")) {
            $view = "voyager::$slug.browse";
        }

        $vendedores = $this->getEmailVendedores();

        return Voyager::view($view, compact(
            'actions',
            'dataType',
            'search',
            'dataTypeContent',
            'isModelTranslatable',
            'orderBy',
            'orderColumn',
            'sortOrder',
            'isServerSide',
            'defaultSearchKey',
            'usesSoftDeletes',
            'showSoftDeleted',
            'showCheckboxColumn',
            'vendedores',
            'filters'
        ));
    }

    private function getEmailVendedores() {
        $emails = MatchRut::select('vendedor')->distinct()->get()->toArray();
        return array_map('end',$emails);
    }
}
