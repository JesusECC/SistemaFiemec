<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puede registrar rutas web para su aplicación. Estas son
| las rutas  cargadas por el RouteServiceProvider dentro de un grupo que
| contiene el grupo de middleware "web". ¡Ahora crea algo grandioso!
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
Route::resource('proforma/config','ControllerConfiguracion');
Route::resource('dashboard/dashboard-admin','ControllerDashboard');
Route::get('proforma/proforma/pdf/{idProforma}','ControllerProformaUnitaria@pdf');


//Route::post('proforma/proforma','ControllerProformaUnitaria@store');

//Se crea las rutas para servicios 

Route::get('servicio/create',['as'=> 'servicio-create','uses' =>'ControllerProformaServicio@create']);


//Route::get('servicios/show',['as'=> 'servicio-show','uses' =>'ControllerProformaServicio@show']);

// Se crea las rutas paratableros
Route::get('tableros',['as' => 'tablero','uses'=>'ControllerProformaTableros@index']);
Route::get('tableros/create',['as' => 'tablero-create','uses'=>'ControllerProformaTableros@create']);
Route::post('tableros/guardar',['as' => 'tablero-store','uses'=>'ControllerProformaTableros@store']);
Route::get('tableros/buscartext',['as' => 'tablero-buscartext','uses'=>'ControllerProformaTableros@buscarProducto']);


//Se crea las rutas para productos
Route::get('productos',['as'=>'producto','uses'=>'ControllerProducto@index']);
Route::get('productos/create',['as'=>'producto-create','uses'=>'ControllerProducto@create']);
Route::post('productos/',['as'=>'producto-store','uses'=>'ControllerProducto@store']);
Route::get('productos/{idProducto}/edit',['as'=>'producto-edit','uses'=>'ControllerProducto@edit']);


//Route::post('proforma/proforma','ControllerProformaUnitaria@store');

