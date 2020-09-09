<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/nuestra-empresa', 'HomeController@empresa')->name('home.empresa');

/*
Route::get('/mi-cotizacion', function () {
    return view('public.mi-cotizacion.index');
});*/

Route::get('/preguntas-frecuentes', 'HomeController@faq')->name('home.faq');

Route::post('/contacto', 'HomeController@contacto')->name('home.contacto');
Route::get('/contacto', 'HomeController@contacto')->name('home.contacto');

/*Route::get('/tips', function () {
    return view('public.tips.index');
});
*/
Route::get('/categoria/{id}', 'CategoriesController@show');
Route::get('/destacados', 'CategoriesController@showDestacados')->name('destacados');
Route::get('/producto/{id}', 'ProductsController@show');
Route::get('/tips', 'HomeController@index')->name('tips');
Route::get('/tips/{slug}', 'HomeController@show');
Route::get('/buscar', 'HomeController@buscar')->name('home.buscar');
Route::post('/suscribe', 'HomeController@suscribe')->name('home.suscribe');
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'CartController@shop')->name('public.index');
Route::get('/shop', 'CartController@shop')->name('shop');
Route::get('/mi-cotizacion', 'CartController@cart')->name('public.mi-cotizacion.index');
Route::get('/success', 'CartController@success')->name('cart.success');
Route::post('/add', 'CartController@add')->name('cart.store');
Route::post('/update', 'CartController@update')->name('cart.update');
Route::post('/remove', 'CartController@remove')->name('cart.remove');
Route::post('/clear', 'CartController@clear')->name('cart.clear');
Route::post('/cotiza', 'CartController@cotiza')->name('cart.cotiza');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('/cotizador/editar/{id}', 'CotizadorController@edit')->middleware('admin.user');
    Route::get('/cotizador', 'CotizadorController@index')->middleware('admin.user')->name('admin.cotizador');
    Route::get('/typeahead', 'CotizadorController@busca');
    Route::post('/cotiza/guarda', 'CotizadorController@guarda')->middleware('admin.user')->name('admin.guarda');
    Route::post('/cotiza/guarda/nueva', 'CotizadorController@guardaNueva')->middleware('admin.user')->name('admin.guarda');
    Route::post('/cotiza/guarda/envia', 'CotizadorController@guardaEnvia')->middleware('admin.user')->name('admin.envia');
    Route::post('/cotiza/nueva/guarda', 'CotizadorController@soloStore')->middleware('admin.user')->name('admin.cotizaGuarda');
    Route::post('/cotiza', 'CotizadorController@store')->middleware('admin.user')->name('admin.cotiza');
    Route::post('/genera', 'CotizadorController@genera')->middleware('admin.user')->name('admin.genera');
    Route::get('/genera', 'CotizadorController@generateFromDB')->middleware('admin.user')->name('admin.genera');
    Route::get('/pdf', 'CotizadorController@pdf')->middleware('admin.user')->name('admin.pdf');
    Route::post('/upload-image', 'CotizadorController@uploadImage')->middleware('admin.user')->name('admin.upload');

    Route::get('/export', 'ExportController@exportMatchRut')->name('export.match_rut');

    Route::get('/import', 'ImportController@getImport')->middleware('admin.user')->name('import');
    Route::get('/email-vendedores', 'ImportController@getVendedoresForm')->middleware('admin.user')->name('email.vendedores');
    Route::post('/email-vendedores', 'ImportController@saveVendedores')->middleware('admin.user')->name('email.vendedores');
    Route::post('/import_process_failures', 'ImportController@processFailures')->name('import.process.failures');
    Route::post('/uploadFile', 'ImportController@uploadFile')->middleware('admin.user')->name('importa');
    Route::get('/change/status','CotizadorController@changeStatus')->middleware('admin.user')->name('admin.change_status');
});
