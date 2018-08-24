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
//Route::get('proforma/servicio','ControllerProformaServicio@index')->name('proforma/servicio');
Route::get('proforma/servicio/create','ControllerProformaServicio@create')->name('proforma/create');

Route::post('proforma/proforma','ControllerProformaUnitaria@store');