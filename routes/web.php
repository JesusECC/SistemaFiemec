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

Route::get('/', 'MainController@index');
Route::get('fiemec',['as' => 'fiemec','uses'=> 'MainController@index']);
Route::resource('proforma/catalogo','ControllerCatalogo');
Route::resource('proforma/empleado','ControllerEmpleados');
Route::resource('proforma/producto','ControllerProducto');
Route::resource('proforma/cliente','ControllerClientes');
Route::resource('proforma/proveedor','ControllerProveedor');
Route::resource('proforma/empresa','ControllerEmpresa');
// Route::resource('proforma/proforma','ControllerProformaUnitaria');
Route::resource('proforma/servicio','ControllerProformaServicio');
Route::resource('proforma/config','ControllerConfiguracion');
Route::resource('proforma/familia','ControllerFamilia');
Route::resource('dashboard/dashboard-admin','ControllerDashboard');


//Route::post('proforma/proforma','ControllerProformaUnitaria@store');

//Se crea las rutas para servicios 

Route::get('servicio/create',['as'=> 'servicio-create','uses' =>'ControllerProformaServicio@create']);


//Route::get('servicios/show',['as'=> 'servicio-show','uses' =>'ControllerProformaServicio@show']);

// Se crea las rutas para tableros
Route::get('tableros',['as' => 'tablero','uses'=>'ControllerProformaTableros@index']);
Route::get('tableros/create',['as' => 'tablero-create','uses'=>'ControllerProformaTableros@create']);
Route::post('tableros/guardar',['as' => 'tablero-store','uses'=>'ControllerProformaTableros@store']);
Route::get('tableros/buscartext',['as' => 'tablero-buscartext','uses'=>'ControllerProformaTableros@buscarProducto']);

Route::get('proforma/tablero/pdf/{idProforma}','ControllerProformaTableros@pdf');
//Route::get('proforma/tablero/pdf2/{idProforma}','ControllerProformaTableros@pdf2');


//Se crea las rutas para productos 
Route::get('productos',['as'=>'producto','uses'=>'ControllerProducto@index']);
Route::get('productos/create',['as'=>'producto-create','uses'=>'ControllerProducto@create']);
Route::post('productos/',['as'=>'producto-store','uses'=>'ControllerProducto@store']);
Route::get('productos/{idProducto}/edit',['as'=>'producto-edit','uses'=>'ControllerProducto@edit']);

//se crea las rutas para catalago 
Route::get('catalogo',['as'=>'catalogo','uses'=>'ControllerCatalogo@index']);
Route::get('catalogo/show/{idProducto}',['as'=>'catalogo-show','uses'=>'ControllerCatalogo@show']);
//Se crea rutas para familias

Route::get('familias',['as'=>'familia','uses'=>'ControllerFamilia@index']);
Route::get('familias/create',['as'=>'familia-create','uses'=>'ControllerFamilia@create']);
Route::post('familias/',['as'=>'familia-store','uses'=>'ControllerFamilia@store']);
Route::get('familias/{idFamilia}/edit',['as'=>'familia-edit','uses'=>'ControllerFamilia@edit']);


//Se crea rutas para tipodecambio
Route::get('configuraciones',['as'=>'config','uses'=>'ControllerConfiguracion@index']);
Route::get('configuraciones/create',['as'=>'config-create','uses'=>'ControllerConfiguracion@create']);
Route::post('configuraciones/',['as'=>'config-store','uses'=>'ControllerConfiguracion@store']);
Route::get('configuraciones/{idFamilia}/edit',['as'=>'config-edit','uses'=>'ControllerConfiguracion@edit']);


//rutas de proforma
Route::post('proformas/guardar',['as' => 'proforma-store','uses'=>'ControllerProformaUnitaria@store']);
Route::get('proformas',['as'=>'proforma','uses'=>'ControllerProformaUnitaria@index']);
Route::get('proformas/create',['as'=>'proforma-create','uses'=>'ControllerProformaUnitaria@create']);
Route::get('proformas/editar/{id}',['as'=>'proforma-edit','uses'=>'ControllerProformaUnitaria@edit']);
Route::post('proformas/editar/modificar',['as' => 'proforma-update','uses'=>'ControllerProformaUnitaria@update']);
// Route::post('proformas/',['as'=>'proforma-store','uses'=>'ControllerProformaUnitaria@store']);
Route::get('proforma/proforma/pdf/{idProforma}','ControllerProformaUnitaria@pdf');
Route::get('proforma/proforma/pdf2/{idProforma}','ControllerProformaUnitaria@pdf2');
Route::get('proformas/show/{id}',['as'=>'proforma-show','uses'=>'ControllerProformaUnitaria@show']);
Route::delete('proformas/eliminar/{id}',['as'=>'proforma-eliminar','uses'=>'ControllerProformaUnitaria@destroy']);


//rutas bandejas
Route::post('bandejas/guardar',['as' => 'bandejas-store','uses'=>'ControllerBandejas@store']);
Route::get('bandejas',['as'=>'bandejas','uses'=>'ControllerBandejas@index']);
Route::get('bandejas/create',['as'=>'bandejas-create','uses'=>'ControllerBandejas@create']);
Route::get('proforma/bandejas/pdf/{idProforma}','ControllerBandejas@pdf');
Route::get('proforma/bandejas/pdf2/{idProforma}','ControllerBandejas@pdf2');
Route::get('bandejas/show/{id}',['as'=>'bandejas-show','uses'=>'ControllerBandejas@show']);
Route::delete('bandejas/eliminar/{id}',['as'=>'bandejas-eliminar','uses'=>'ControllerBandejas@destroy']);

//rutas servicios



Route::get('servicios',['as'=>'servicio','uses'=>'ControllerProformaServicio@index']);
Route::get('servicios/create',['as'=>'servicio-create','uses'=>'ControllerProformaServicio@create']);
Route::post('servicios/',['as'=>'servicio-store','uses'=>'ControllerProformaServicio@store']);
//Route::post('proforma/proforma','ControllerProformaUnitaria@store');

