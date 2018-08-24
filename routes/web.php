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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('proforma/catalogo','ControllerCatalogo');
Route::resource('proforma/empleado','ControllerEmpleados');
Route::resource('proforma/producto','ControllerProducto');
Route::resource('proforma/cliente','ControllerClientes');
Route::resource('proforma/proveedor','ControllerProveedor');
Route::resource('proforma/empresa','ControllerEmpresa');
Route::resource('proforma/proforma','ControllerProformaUnitaria');
Route::resource('proforma/servicio','ControllerProformaServicio');

//Servicios
Route::get('servicios',['as'=> 'servicio','uses' =>'ControllerProformaServicio@index']);

Route::get('servicios/create',['as'=> 'servicio-create','uses' =>'ControllerProformaServicio@create']);


Route::get('servicios/show',['as'=> 'servicio-show','uses' =>'ControllerProformaServicio@show']);

//tableros
Route::get('tableros',['as' => 'tablero','uses'=>'ControllerProformaTableros@index']);
Route::get('tableros/create',['as' => 'tablero-create','uses'=>'ControllerProformaTableros@create']);
Route::post('tableros',['as' => 'tablero-store','uses'=>'ControllerProformaTableros@store']);
Route::get('tableros/buscartext',['as' => 'tablero-buscartext','uses'=>'ControllerProformaTableros@buscarProducto']);









Route::post('proforma/proforma','ControllerProformaUnitaria@store');
